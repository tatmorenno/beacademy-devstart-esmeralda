@extends('layouts.default')
@section('title', 'Admin Produtos')
@section('content')

<section class="text-gray-600 py-16">

    @include('shared.search')


    <div class="container px-5 py-2 mx-auto w-full">
        {{ $products->links() }}
    </div>

    <div class="container px-5 pt-8 pb-24 mx-auto w-full">


        <div class="w-full mx-auto overflow-auto">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">
                    Produtos
                </h1>
                <a href="{{ route('admin.product.create') }}" class="flex ml-auto text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none
                hover:bg-indigo-600 rounded">
                    Adicionar
                </a>
            </div>
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            #
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"
                            style="width: 150px">
                            Imagem
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Nome
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Preço de Custo
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Preço de Venda
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Estoque
                        </th>
                        <th
                            class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 text-right">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y">

                    @foreach ($products as $product)
                    <tr class="even:bg-gray-100 odd:bg-white">
                        <td class="px-4 py-3">{{ $product->id }}</td>
                        <td class="px-4 py-3">
                            <img alt="{{ $product->name }}" class="object-cover object-center w-full h-[80px] block"
                                src="{{ $product->cover }}" />
                        </td>
                        <td class="px-4 py-3">{{ $product->name }}</td>
                        <td class="px-4 py-3">R${{ $product->price_cost }}</td>
                        <td class="px-4 py-3">R${{ $product->price_sell }}</td>
                        <td class="px-4 py-3">{{ $product->stock }}</td>
                        <td class="px-4 py-3 text-sm text-right space-x-3 text-gray-900">
                            <a href="{{ route('admin.product.edit', $product->id) }}"
                                class="mt-3 text-indigo-500 inline-flex items-center">Editar</a>
                            <form method="POST" action="{{ route('admin.product.destroy', $product->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="mt-3 text-indigo-500 inline-flex items-center">Deletar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection