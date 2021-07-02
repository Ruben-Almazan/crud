<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crear cuenta</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href=" {{ asset('css/tailwind.output.css') }}" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>
  </head>
  <body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div
        class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
      >
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img
              aria-hidden="true"
              class="object-cover w-full h-full dark:hidden"
              src="https://institutoclaritas.com/wp-content/uploads/2020/07/Sindrome-de-la-cabana-Claritas.png"
              alt="Office"
            />
            <img
              aria-hidden="true"
              class="hidden object-cover w-full h-full dark:block"
              src="https://windmill-dashboard.vercel.app/assets/img/create-account-office-dark.jpeg"
              alt="Office"
            />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
            <h1
            align="center" class="mb-4 text-xl font-semibold text-green-700 dark:text-green-200"
              >
                Bienvenido al registro de Cabañas "La Calma"
              </h1>
              <h2 align="center"
                class="mb-4 text-xl font-semibold text-black-700 dark:text-gray-200"
              >
                Crear cuenta
              </h2>

              @if($errors->any())
	            <div class="alert alert-danger">
		            <ul>
			            @foreach ($errors->all() as $error)
				        <li>{{ $error }}</li>
			            @endforeach
		            </ul>
		            <br>
	            </div>
	        @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">{{ __('Name') }}</span>
                <input
                  type="text"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Ingresa tu nombre"
                  name="name"
                  id="name"
                  value="{{old('name')}}"
                />
              </label>
              <br>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">{{ __('Email') }}</span>
                <input
                  type="email"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="example@example.com"
                  name="email"
                  id="email"
                  value="{{old('email')}}"
                />
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">{{ __('Codigo de trabajador') }}</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  type="number"
                  name="codigo"
                  id="codigo"
                  value="{{old('codigo')}}"
                />
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">{{ __('Tipo de usuario') }}</span>
                <input type="radio" name="tipo" value="Empleado"/>Administrador
                <input type="radio" name="tipo" value="Alumno"/>Cliente
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">{{ __('Password') }}</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="***************"
                  type="password"
                  name="password"
                  id="password"
                  value="{{old('password')}}"
                />
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                {{ __('Confirm Password') }}
                </span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="***************"
                  type="password"
                  name="password_confirmation"
                  id="password_confirmation"
                  value="{{old('password_confirmation')}}"
                />
              </label>

              <div class="flex mt-6 text-sm">
                <label class="flex items-center dark:text-gray-400">
                  <input
                    type="checkbox"
                    class="text-green-600 form-checkbox focus:border-green-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  />
                  <span class="ml-2">
                    I agree to the
                    <span class="underline">privacy policy</span>
                  </span>
                </label>
              </div>

              <!-- You should use a button here, as the anchor is only used for the example  -->
              <button
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple"
               >
              {{ __('Register') }}
              </button>
            </form>

              <hr class="my-8" />        

              <p class="mt-4">
                <a
                  class="text-sm font-medium text-green-600 dark:text-green-400 hover:underline"
                  href="{{ route('login') }}"
                >
                  ¿Ya tienes una cuenta? Inicia Sesión
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

