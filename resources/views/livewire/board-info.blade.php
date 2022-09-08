<div>
    <div class="row">
        <div class="col-sm-4">
            <label>نوع موضوع پست :</label>
            <select wire:model="type" class="custom-select">
                <option value="2">کلی</option>
                <option value="1">بخش یا فصل خاص</option>
            </select>
        </div>
    </div>
    @if($type==1)
        <div class="row">
            <div class="col-sm-6">
                <label for="usr">کتاب مورد نظر</label>
                <select name="book_id" wire:model="book_id" wire:change="updateSeasons" class="custom-select" id="user">
                    <option>انتخاب کنید</option>
                    @foreach($books as $book)
                        <option value="{{$book->id}}">{{$book->title}}</option>

                    @endforeach

                </select>
            </div>
            <div class="col-sm-6">
                <label for="usr">فصل کتاب</label>
                <select name="season_id" wire:model="season_id" wire:change="updateTopics" class="custom-select"
                        id="user">

                    <option>انتخاب کنید</option>
                    @foreach($seasons as $season)
                        <option value="{{$season->id}}">{{$season->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
</div>
