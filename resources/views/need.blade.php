@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="pb-130 pt-45">
            <div class="container">
                <div class="head-box ">
                    <div class="title-head">{{$map->title}}</div>
                    <div class="head-line"></div>
                </div>

                <!--map vis-->
                <div class="text-center mb-2">
                    <div style="min-height: 500px;" id="mynetwork_olom"></div>
                </div>


                @foreach($map->season as $season)
                    <section class="add-text-box lesson-map-box" id="season{{$season->id}}">
                        <div class="text-center mb-5">
                            <img src="{{asset('uploads/'.$season->image)}}" class="img-fluid" alt="">
                        </div>
                        <div class="d-flex justify-content-between flex-wrap">
                            <div class="">
                                <div class="head-box">
                                    <div class="title-head">{{$season->title}}</div>
                                    <div class="head-line"></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div data-toggle="collapse" data-target="#demo{{$season->id}}"
                                     class="first-color cursor-pointer">
                                    مشاهده همه پیشنهادات این فصل
                                    <i class="fa fa-chevron-circle-down"></i>
                                </div>


                            </div>
                        </div>
                        <div id="demo{{$season->id}}" class="collapse show">
                            <ul class="suggest-list">
                                @foreach($season->detail as $detail)
                                    <li class="suggest-box">
                                        <h3>{{$detail->title}}</h3>
                                        <p>
                                            {!! $detail->body !!}
                                        </p>
                                    </li>

                                @endforeach

                            </ul>
                        </div>
                    </section>

                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script
        type="text/javascript"
        src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"
    ></script>
    <script>
        // create an array with nodes
        var nodes = new vis.DataSet([
            {id: 1, label: "{{$map->title}}", shape: 'box'},
                @foreach($map->season as $season)
            {
                id: {{$season->id}}, label: "{{$season->title}}", url: "#season{{$season->id}}"
            },
            @endforeach

        ]);

        // create an array with edges
        var edges = new vis.DataSet([
                @foreach($map->season as $season)

            {
                from: 1, to: {{$season->id}}
            },
            @endforeach

        ]);

        // create a network
        var container = document.getElementById("mynetwork_olom");
        var data = {
            nodes: nodes,
            edges: edges,
        };
        var options = {};
        var network = new vis.Network(container, data, options);
        network.on("doubleClick", function (params) {
            if (params.nodes.length === 1) {
                var node = nodes.get(params.nodes[0]);
                if (node.url != null) {
                    window.open(node.url, '_top');
                }
            }
        });
        $('.tree .icon').click(function () {
            $(this).parent().toggleClass('expanded').closest('li').find('ul:first').toggleClass('show-effect');
        });
    </script>
@endpush
@push('styles')
    <style>
        #mynetwork_olom {
            width: 600px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-content: center;
            margin: auto;
            height: 400px;
            border: 1px solid lightgray;
        }

        ul.tree, .tree li {
            list-style: none;
            margin: 0;
            padding: 0;
            cursor: pointer;
        }

        .tree ul {
            display: none;
        }

        .tree > li {
            display: block;
            background: #eee;
            margin-bottom: 2px;
        }

        .tree span {
            display: block;
            padding: 10px 12px;

        }

        .icon {
            display: inline-block;
        }

        .tree .hasChildren > .expanded {
            background: #999;
        }

        .tree .hasChildren > .expanded a {
            color: #fff;
        }

        .icon:before {
            content: "+";
            display: inline-block;
            min-width: 20px;
            text-align: center;
        }

        .tree .icon.expanded:before {
            content: "-";
        }

        .show-effect {
            display: block !important;
        }
    </style>
@endpush
