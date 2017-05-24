@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tabs-container">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#tab-1" style="background: #fff"> Add item</a></li>
                                            <!-- <li class=""><a data-toggle="tab" href="#tab-2"> Add </a></li> -->
                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab-1" class="tab-pane active">
                                                <div class="panel-body">

                                                    <fieldset class="form-horizontal">
                                                        <div class="form-group"><label class="col-sm-2 control-label">Title:</label>
                                                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="Blog title"></div>
                                                        </div>
                                                        
                                                        <div class="form-group"><label class="col-sm-2 control-label">Content:</label>
                                                            <div class="col-sm-10" ng-controller="summernoteController">
                                                                <summernote config="options" ng-model="text"></summernote>
                                                                <!-- <summernote>
                                                                    <h3>Lorem Ipsum is simply</h3>
                                                                    dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's</strong> standard dummy text ever since the 1500s,
                                                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                                                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                                                                    <br/>

                                                                </summernote> -->
                                                            </div>
                                                        </div>
                                                        <div class="form-group"><label class="col-sm-2 control-label">Category:</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-control" id="sel1">
                                                                    <option>Blog</option>
                                                                    <option>Signal</option>
                                                                    <option>Lesion</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group"><label class="col-sm-2 control-label">Tag Keywords:</label>
                                                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="Lorem, Ipsum, has, been"></div>
                                                        </div>
                                                    </fieldset>

                                                </div>
                                            </div>
                                            <div id="tab-2" class="tab-pane">
                                                <div class="panel-body">

                                                    <fieldset class="form-horizontal">
                                                        <div class="form-group"><label class="col-sm-2 control-label">ID:</label>
                                                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="543"></div>
                                                        </div>
                                                        <div class="form-group"><label class="col-sm-2 control-label">Model:</label>
                                                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="..."></div>
                                                        </div>
                                                        <div class="form-group"><label class="col-sm-2 control-label">Location:</label>
                                                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="location"></div>
                                                        </div>
                                                        <div class="form-group"><label class="col-sm-2 control-label">Tax Class:</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-control" >
                                                                    <option>option 1</option>
                                                                    <option>option 2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group"><label class="col-sm-2 control-label">Quantity:</label>
                                                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="Quantity"></div>
                                                        </div>
                                                        <div class="form-group"><label class="col-sm-2 control-label">Minimum quantity:</label>
                                                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="2"></div>
                                                        </div>
                                                        <div class="form-group"><label class="col-sm-2 control-label">Sort order:</label>
                                                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="0"></div>
                                                        </div>
                                                        <div class="form-group"><label class="col-sm-2 control-label">Status:</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-control" >
                                                                    <option>option 1</option>
                                                                    <option>option 2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </fieldset>


                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
