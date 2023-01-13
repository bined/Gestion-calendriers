<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter Evénement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                <form method="post" action="{{ route('event.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Titre</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date début</label>
                        <input type="text" name="start_date" class="form-control datepicker" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date fin</label>
                        <input type="text" name="end_date" class="form-control datepicker" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Calendrier</label>
                        <select name="calender" class="form-control" required>
                            @foreach($calenders as $calender)
                                <option value="{{ $calender->id }}">{{ $calender->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
