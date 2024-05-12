<div class="sidebar">
    <div class="menu-item">
      <a href="{{url('/home')}}">Home</a>
    </div>
    
    <div class="menu-item">
    <div class="btn-group dropend ">
        <button type="button" class="btn">
            Meals
          </button>
          <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropend</span>
          </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('meals.index')}}">View Meals</a></li>
            <li><a class="dropdown-item" href="{{route('meals.create')}}">Add Meal</a></li>
        </ul>
      </div>
    </div>
    <div class="menu-item">
    <div class="btn-group dropend ">
        <button type="button" class="btn">
            Category
          </button>
          <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropend</span>
          </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('categories.index')}}">Add new Type</a></li>
        </ul>
      </div>
    </div>

    <div class="menu-item">
      <a href="#">About</a>
    </div>
    <div class="menu-item">
      <a href="#">Contact</a>
    </div>
  </div>