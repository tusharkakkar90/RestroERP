<div class="container">
<form class="border border-light card" method="post">
  <h1 class="card-header bg-info text-white text-center  py-4">Employee Form</h1>
  <div class="form-group">
    <label for="name">Name</label>
    <input  type="text" class="form-control" id="name" name="name" placeholder="Enter Employee name" required>
  </div>
  <div class="form-group">
    <label for="phno">Phone Number</label>
    <input type="text" class="form-control" id="phno" name="phno" placeholder="Enter Employee Phone Number" required>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
  </div>
  <div class="form-group col-md-6">
    <label for="Password">Password</label>
    <input type="Password" class="form-control" id="Password" name="Password" placeholder="Password" required>
  </div>
</div>
  <div class="form-group">
    <label for="status">Status select</label>
    <select class="form-control custom-select" id="status" name="status" required>
      <option selected>Open this select menu</option>
      <option value="1">Admin</option>
      <option value='0'>General</option>
    </select>
     <div class="form-group">
    <label for="phno">Salary</label>
    <input type="number" class="form-control" id="salary" name="salary" placeholder="Enter Employee Salary" required>
  </div>

  </div>
  <button type="submit" id="Submit" name="Submit" class="btn btn-outline-info mb-2">Submit</button>

</form>
</div>