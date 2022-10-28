<!-- Footer opened -->
<footer class="bg-white p-4 ">
    <div class="row">
      <div class="col-md-6">
        <div class="text-center text-md-left">
            <p class="mb-0"> &copy; Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>. <a href="{{URL('/dashboard')}}"> School System </a> All Rights Reserved </p>
        </div>
      </div>
      <div class="col-md-6">
        <ul class="text-center text-md-right">
            <li class="list-inline-item"><a href="{{route('profiles.index')}}">My Profile</a> </li>
            <li class="list-inline-item"><a href="{{URL('/teacher/dashboard')}}">Dashboard</a> </li>
        </ul>
      </div>
    </div>
  </footer>
<!-- Footer closed -->
