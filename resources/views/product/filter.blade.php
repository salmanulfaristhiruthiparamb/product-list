<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#filter{{ $count }}">
        Filter {{ $count }}</a>
      </h4>
    </div>
    <div id="filter{{ $count }}" class="filter panel-collapse collapse in">
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