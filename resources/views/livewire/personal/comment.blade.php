<div>
    <li>
        <div class="comment_item">
            <div class="name-commenter">
                <img src="{{asset('assets/img/user.png')}}" alt="" class="img-fluid">
                <span class="mx-2">{{$comment->user->name}}

                </span>
            </div>

            <div class="comment-box">
                <div class="">
                    <h6>
                        @if($reply)
                            در پاسخ به
                            {{$parent}}
                        @endif
                    </h6>
                    <p>
                        {{$comment->body}}
                    </p>
                    <div class="text-left">
                        <button class="btn btn-reply" wire:click="initReply"  data-toggle="modal" data-target="#exampleModal">
                            پاسخ به این پیشنهاد
                            <img src="{{asset('assets/img/repeat.svg')}}" alt="">
                        </button>
                    </div>
                </div>

                <div class="d-flex justify-content-between bottom-box flex-wrap">
                    <p>انتشار: {{\Morilog\Jalali\Jalalian::fromDateTime($comment->updated_at)->ago()}}</p>
                    <div class="accept-comment d-flex align-items-center">
                        <p>آیا این پیشنهاد را قبول دارید؟</p>
                        <button class="btn" wire:click="doLike">{{$like}}<img src="{{asset('assets/img/like.svg')}}" alt="">
                        </button>
                        <button class="btn" wire:click="doDisLike"><img src="{{asset('assets/img/dislike.svg')}}" alt="">{{$dislike}}
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </li>
    @foreach($comment->comments as $comment)
        @livewire('personal.comment',['comment'=>$comment,'reply'=>true,'parent'=>$comment->user->name],key($comment->id))
    @endforeach
</div>
