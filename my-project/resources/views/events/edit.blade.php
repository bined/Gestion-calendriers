<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Evénement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                <form method="post" action="{{ route('event.update', $item->id) }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label">Titre</label>
                        <input type="text" name="title" class="form-control" value="{{$item->title}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date début</label>
                        <input type="text" name="start_date" class="form-control datepicker" value="{{$item->start_date}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date fin</label>
                        <input type="text" name="end_date" class="form-control datepicker" value="{{$item->end_date}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control">{{ $item->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Calendrier</label>
                        <select name="calender" class="form-control" required>
                            @foreach($calenders as $calender)
                                <option @if($calender->id == $item->calender_id) selected="selected" @endif value="{{ $calender->id }}">{{ $calender->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
