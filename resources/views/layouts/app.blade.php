<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Bib</title>
</head>
<body class="bg-gray-100">
  <nav class="bg-gray-900 flex justify-end p-6 mb-6">
    <ul class="flex items-center text-green-500">
      <li><a href="" class="p-3">Home</a></li>
      <li><a href="" class="p-3">Contact</a></li>
      @auth
      <li><a href="" class="p-3">John Doe</a></li>
      <li>
        <form action="{{ route('logout') }}" method="post" class="p-3 inline">
          @csrf
          <button type="submit">Logout</button>
        </form>
      </li>
      @endauth

      @guest
      <li><a href="{{ route('login') }}" class="p-3">Log in</a></li>
      @endguest
    </ul>
  </nav>

  @auth
  <div class="fixed top-0 left-0 h-screen w-16 flex flex-col
                  bg-gray-900 shadow-lg">
    <div class="sidebar-icon group">
      <i class="fas fa-book"></i><span class="sidebar-tooltip group-hover:opacity-100">Livres</span>
    </div>
    <div class="sidebar-icon group">
      <i class="fas fa-users"></i><span class="sidebar-tooltip group-hover:opacity-100">Abonnés</span>
    </div>
    <div class="sidebar-icon group">
      <i class="fas fa-align-right"></i><span class="sidebar-tooltip group-hover:opacity-100">Catégories</span>
    </div>
    <div class="sidebar-icon group">
      <i class="fas fa-address-book"></i><span class="sidebar-tooltip group-hover:opacity-100">Emprunts</span>
    </div>
    <div class="sidebar-icon group">
      <i class="fas fa-quote-right"></i><span class="sidebar-tooltip group-hover:opacity-100">Mots-clés</span>
    </div>
    <div class="sidebar-icon group">
      <a href="{{ route('managers') }}">
        <i class="fas fa-user-shield"></i><span class="sidebar-tooltip group-hover:opacity-100">Gestionnaires</span>
      </a>  
    </div>

  </div>
  @endauth

  @yield('content')
</body>
</html>