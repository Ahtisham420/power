<div>                                    <div class="row">                                        <div class="container">                                            <div class="col-12">                                                <div class="alert mt-5" id="garage_status"                                                     style="width: 100%;display:none"></div>                                                <div class="row mt-5 append-fetch-data-dashboard-mics">                                                   @if (!empty($misc) && count($misc) > 0)@foreach ($misc as $car)@phpif(!empty($car->pics)){$car_pic = json_decode($car->pics);$cars = $car_pic[0];}else{$cars = '';}@endphp<div class="col-12 col-sm-6 col-md-3 mb-3 cardetail"><div class="card"><img class="card-img-top"src='{{asset('/public/crop_images/'.$car->feature_img)}}'alt="Card image cap"><div class="card-body"><div class="carname">{{ $car->car_part }}</div><div class="carname">£{{ $car->price }}</div><div class="editordelete"><div class="edit"><ahref="{{ route('create-misc-dashboard',['id'=>base64_encode($car->id)]) }}">Edit</a></div><div class="divider"></div><div class="delete"><ahref="javascript:void(0)"class="misecellinous_del"data-delete="{{ base64_encode($car->id) }}">Delete</a></div></div></div></div></div>@endforeach@endif                                                </div>                                            </div>                                        </div>                                    </div>                                    <div class="col-12 ml-auto d-flex red-color-paginate">@if(!empty($misc)){{$misc->links()}}@endif</div>                                </div>