<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <link
      href="../css/output.css"
      rel="stylesheet"
    />
    <script src="../js/validate_login.js" defer></script>
  </head>
  <body class="h-screen w-full bg-slate-600">
    <nav class="flex flex-row justify-between items-center max-sm:h-16 h-20 max-sm:px-2 px-4 bg-slate-700">
        <img
        src="../images/image.png"
        alt="petshop-logo"
        class="max-sm:h-12 h-16 rounded-lg"
      />
      <section class="links transition-all flex max-sm:gap-5 gap-8 max-sm:text-base text-xl font-medium text-white">
        <p class="hover:scale-110 hover:cursor-pointer transition-all"><a href="/html/index.html">Home</a></p>
        <p class="hover:scale-110 hover:cursor-pointer transition-all"><a href="/php/appointmens.php">Compromissos</a></p>
        <p class="hover:scale-110 hover:cursor-pointer transition-all">Sobre nós</p>
      </section>
    </nav>
    <div class="flex max-sm:flex-col max-sm:mt-10 w-full h-5/6 justify-center items-center text-4xl gap-5">
      <a href="/html/hotel.html" class="flex items-center justify-center w-1/4 max-sm:w-2/3 h-1/2 max-lg:h-1/3 max-sm:h-1/4 text-center bg-yellow-600 rounded-lg hover:cursor-pointer hover:brightness-125 transition-all">
        <h1>Hotel</h1>
      </a>
      <a href="/html/bath.html" class="flex items-center justify-center w-1/4 max-sm:w-2/3 h-1/2 max-lg:h-1/3 max-sm:h-1/4 text-center bg-yellow-600 rounded-lg hover:cursor-pointer hover:brightness-125 transition-all">
        <h1>Banho</h1>
      </a>
      <a href="/html/daycare.html" class="flex items-center justify-center w-1/4 max-sm:w-2/3 h-1/2 max-lg:h-1/3 max-sm:h-1/4 text-center bg-yellow-600 rounded-lg hover:cursor-pointer hover:brightness-125 transition-all">
        <h1>Creche</h1>
      </a>
    </div>    
  </body>
  <script src="../js/testeFetch.js"></script>
</html>