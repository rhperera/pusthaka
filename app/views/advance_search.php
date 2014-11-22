<script>
  function tog(name)
  {
    $('#'+name).toggle();
    $('#'+name).val('');
  }
</script>
<div class="container">
  <div class="row">
    <br/>
    <div class="col-lg-4">
        <h2>Advance Search</h2>
    </div>
  </div>
 <br>
  <div class="row">
    <div class="col-lg-3">
        <h3>Sort search by</h3>
    </div>
  </div>
  <br>
  <div class="row">

    <div class="col-lg-3">
      <div class="control-group form-group">
          <div class="controls">
              <label>Full or part of title</label>
              <div class="input-group">
              <input type="text" id="title" class="form-control" name="name" required data-validation-required-message="Please enter.">
              <span class="input-group-btn">
                  <button class="btn btn-default" onclick="tog('title')" type="button"><i class="fa fa-check-square"></i></button>
              </span>
            </div>
              <p class="help-block"></p>
          </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="control-group form-group">
          <div class="controls">
              <label>Name of author</label>
              <div class="input-group">
              <input type="text" id="author" class="form-control" name="name" required data-validation-required-message="Please enter.">
              <span class="input-group-btn">
                  <button class="btn btn-default" onclick="tog('author')" type="button"><i class="fa fa-check-square"></i></button>
              </span>
            </div>
          </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="control-group form-group">
          <div class="controls">
              <label>ISBN</label>
            <div class="input-group">
              <input type="text" id ="ISBN" class="form-control" name="name" required data-validation-required-message="Please enter.">
              <span class="input-group-btn">
                  <button class="btn btn-default" onclick="tog('ISBN')" type="button"><i class="fa fa-check-square"></i></button>
              </span>
            </div>
          </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="control-group form-group">
          <div class="controls">
              <label>Uploaded user name</label>
              <div class="input-group">
              <input type="text" id="username" class="form-control" name="name" required data-validation-required-message="Please enter.">
              <span class="input-group-btn">
                  <button class="btn btn-default" onclick="tog('username')" type="button"><i class="fa fa-check-square"></i></button>
              </span>
            </div>
          </div>
      </div>
    </div>


  </div>
