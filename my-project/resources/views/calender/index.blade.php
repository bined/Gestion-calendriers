<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calendriers') }}
            <a class="ms-10 btn btn-primary btn-sm" href="{{ route('calender.create') }}">
                {{ __('Ajouter') }}
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                <div class="col">
                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Date de creation</th>
                            <th>Action</th>
                        </tr>
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->created_at->toDateTimeString() }}</td>
                                <td>
                                    <a href="{{ route('calender.edit', $item->id) }}" class="btn btn-success btn-sm table-btn-action">Edit</a>
                                    <form action="{{ route('calender.destroy', $item->id) }}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button  class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
