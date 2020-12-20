<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ env('APP_NAME') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid">
            <div class="container">
                <h1>Product Listing based on Rules</h1>
                <div class="col-md-4">
                    <h3>Filters <button class="btn btn-warning pull-right" onclick="createFilter()">Add Filter</button></h3>
                    
                    <div class="panel-group" id="accordion" data-src="{{ route('product_filter') }}">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#filter1">
                              Filter 1</a>
                            </h4>
                          </div>
                          <div id="filter1" class="filter panel-collapse collapse in">
                            <div class="panel-body">
                                <form onsubmit="return getProducts(this)" action="{{ route('product_with_rule') }}" method="post">
                                    <div class="col-md-12 price">
                                        <p>Price</p>
                                        <div class="col-md-5">
                                            <p>Min</p>
                                            <input type="number" class="form-control" name="price_min" value="" min="0"></div>
                                        <div class="col-md-2">&nbsp;</div>
                                        <div class="col-md-5">
                                            <p>Max</p>
                                            <input type="number" class="form-control" name="price_max" value="" min="0"></div>
                                    </div>
                                    <div class="col-md-12 upload_speed">
                                        <p>Upload Speed</p>
                                        <div class="col-md-5">
                                            <p>Min</p>
                                            <input type="number" class="form-control" name="upload_speed_min" value="" min="0"></div>
                                        <div class="col-md-2">&nbsp;</div>
                                        <div class="col-md-5">
                                            <p>Max</p>
                                            <input type="number" class="form-control" name="upload_speed_max" value="" min="0"></div>
                                    </div>
                                    <div class="col-md-12 upload_speed">
                                        <p>Download Speed</p>
                                        <div class="col-md-5">
                                            <p>Min</p>
                                            <input type="number" class="form-control" name="download_speed_min" value="" min="0"></div>
                                        <div class="col-md-2">&nbsp;</div>
                                        <div class="col-md-5">
                                            <p>Max</p>
                                            <input type="number" class="form-control" name="download_speed_max" value="" min="0"></div>
                                    </div>
                                    <div class="col-md-12 technology">
                                        <p>Technology</p>
                                        <div class="col-md-12">
                                            <select class="form-control" name="technology">
                                                <option value="0">All</option>
                                                <option value="1">Fiber</option>
                                                <option value="2">Dialup</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 static_ip">
                                        <p>Static IP</p>
                                        <div class="col-md-12">
                                            <select class="form-control" name="static_ip">
                                                <option value="2">All</option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <p></p>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <button type="submit" class="btn btn-success">Filter</button>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-md-2">
                    &nbsp;
                </div>
                <div class="col-md-6">
                    <h3>Products</h3>
                    <div class="col-md-12" id="products">
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function getProducts(elemForm)
            {
                formFields = $(elemForm).serialize();
                $.ajax({
                    url : $(elemForm).attr('action'),
                    type: $(elemForm).attr('method'),
                    dataType: 'html',
                    data: formFields,
                    success: function(data){
                        $('#products').html(data);
                    },
                    error: function(data){

                    }
                });
                return false;
            }

            function createFilter()
            {
                var count = $('.filter').length + 1;
                $.ajax({
                    url: $('#accordion').data('src'),
                    type: 'post',
                    dataType: 'html',
                    data: {
                        length: count
                    },
                    success: function($data) {
                        $('#accordion').append($data);
                    }
                })
            }
        </script>
    </body>
</html>
