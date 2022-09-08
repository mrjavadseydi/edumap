<div class="container">
    <section class="individual-role">
        <div class="head-box">
            <div class="title-head">نقشه های اجماع
            {{\App\Models\State::where('id',auth()->user()->state_id)->first()->title}}
            </div>
            <div class="head-line"></div>
        </div>
        <div class="">
            <div class="form-box">
                <div class="select-role-box">
                    @foreach($books as $book)
                        <div class="custom-control custom-radio">

                            <input type="radio" class="custom-control-input" wire:change="updateMonth"
                                   wire:model="book_id" id="customRadio{{$book->id}}" name="example"
                                   value="{{$book->id}}">
                            <label for="customRadio{{$book->id}}" class="selected-lable">
                                <img src="{{asset('uploads/'.$book->image)}}" class="img-fluid" alt="">
                            </label>
                            <label class="custom-control-label" for="customRadio">{{$book->title}}</label>
                        </div>
                    @endforeach


                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="user">انتخاب ماه نقشه</label>
                        <select name="cars" class="custom-select" id="user" wire:model="month"
                                wire:change="updateMaps">
                            <option selected>انتخاب کنید</option>
                            @foreach($months as $month)
                                <option>{{$month}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Modal -->
            </div>
        </div>
    </section>
    @foreach($maps as $map)

    <div class="teacher-suggestion">
        <h4 class="title">{{$map->title}}</h4>
        <div class=" teacher-suggestion-box">
            <div class="d-flex">
                <div class="img-box">
                    <img src="{{asset('uploads/'.$map->book->image)}}" alt="">
                </div>
                <div class="specifications-box">
{{--                    <div class="">--}}
{{--                        <img src="{{asset('assets/img/user-edit.svg')}}" alt="">--}}
{{--                        سارا عزیزی--}}
{{--                    </div>--}}
                    @role('admin')
                    <div class="">
                        استان:
                        {{\App\Models\Province::where('id',$map->state->province_id)->first()->title}}
                    </div>
                    <div class="">
                        منطقه:
                        {{$map->state->first()->title}}
                    </div>
                    @endrole
                    <div class=""><img src="{{asset('assets/img/calendar-edit.svg')}}" alt="">انتشار
                        {{\Morilog\Jalali\Jalalian::fromDateTime($map->created_at)->format('Y/m/d')}}
                    </div>
                </div>
            </div>
            <div class="dscp-box">

                <p>
                {!! $map->body !!}
                </p>
            </div>
        </div>
    </div>
    @endforeach

</div>
