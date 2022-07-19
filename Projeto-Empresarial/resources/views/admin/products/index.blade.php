@extends('layouts.default')
@section('title', 'Admin Produtos')

@section('content')

<section class="section-container">
    @include('shared.search')


    <div class="pt-16 pb-12">
        {{ $products->links() }}
    </div>

    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">
            Produtos
        </h1>
        <a href="{{ route('admin.products.create') }}" class="btn-primary">
            Adicionar
        </a>
    </div>

    <div class="w-full mx-auto overflow-auto">

        <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
                <tr>
                    <th class="table-th">
                        #
                    </th>
                    <th class="table-th">
                        Imagem
                    </th>
                    <th class="table-th">
                        Nome
                    </th>
                    <th class="table-th">
                        Preço de Custo
                    </th>
                    <th class="table-th">
                        Preço de Venda
                    </th>
                    <th class="table-th">
                        Estoque
                    </th>
                    <th class="table-th text-right">
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
                            src="{{ $product->cover }}" style="width: 150px; min-width: 150px;" />
                    </td>
                    <td class="px-4 py-3">{{ $product->name }}</td>
                    <td class="px-4 py-3">R${{ $product->price_cost }}</td>
                    <td class="px-4 py-3">R${{ $product->price_sell }}</td>
                    <td class="px-4 py-3">{{ $product->stock }}</td>
                    <td class="px-4 py-3 text-sm text-right space-x-3 text-gray-900">
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                            class="mt-3 text-indigo-500 inline-flex items-center">Editar</a>
                        <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="mt-3 text-indigo-500 inline-flex items-center">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</section>

@endsection