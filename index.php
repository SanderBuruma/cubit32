<!DOCTYPE html>
<html lang="en">
<head>
  <!-- images from https://www.pexels.com
  written by Sander Buruma / sanderburuma@gmail.com
  many icons here originate from https://fontawesome.com/
  imitated from http://mattfarley.ca/ -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sander Buruma | Fullstack Jr Webdeveloper</title>
  <link rel="stylesheet" href="main.css">
  <link rel="icon" href="http://icons.iconarchive.com/icons/icons-land/vista-people/32/Office-Customer-Male-Light-icon.png"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
  <div id="wrapper">
    <div id="nav" class="dropdown" style="float:right;">
      <i id="side-menu-hamburger" class="fas fa-bars dropbtn"></i>
      <div class="dropdown-content">
        <a href="#myname">Home</a>
        <a href="#about">About Me</a>
        <a href="#projects">Projects</a>
        <a href="contact.html">Contact</a>
      </div>
    </div>
    <div id="header">
      <div id="myname">
        <h1>Junior Fullstack Web Developer</h1> 
        <img id="portret" src="img/myAvatar.svg" alt="Mooie foto van Sander"> 
        <div id="changing-text-container">
          <p id="changing-text">Ik codeer simpele en responsieve websites. Fraai en netjes worden mijn websites gemaakt. Neem gerust een kijk door mijn <a href="#projects">projecten</a> om dat te zien!<br/><br/> 
          Mijn passie ligt in het analyseren van de werking van dingen en van logica. Daarnaast speel ik ook wel eens piano wanneer deze beschikbaar is. Naast jr Web Developer ben ik ook opgeleid als medisch laborant en zondags dien ik wel eens den heilige mis in Warfhuizen omdat ik het Katholicisme geweldig vind.</p>
        </div>
        <img id="desktop" src="img/bgheaderbottom.png" alt="Afbeelding met afbeelding van aarde & maan met afmetingen, laptop, kopje koffie, tablet en schermen">
      </div>
    </div>
    <div id="about">
      <h1>Hallo, ik ben Sander. Aangenaam kennis te maken!</h1>
      <p>Ik ben heel goed in coderen en doe het graag. Het liefst doe ik al mijn werk met geometrische harmonie. Ik heb triljoenen microseconden ervaring in het maken van websites, apps en computerprogrammas met behulp van HTML, CSS, Javascript, PHP en SQL. Deze worden gemaakt zonder satire of andere onnozelheden omdat ik <span class="striketr">altijd</span> professioneel tewerk ga en heel erg serieus ben. Bij mijn werk kan u er op aan dat alles netjes en bedachtzaam wordt afgemeten. Aan iedereen wordt tegelijk een diepzinnige, nuttige & aangename ervaring meegegeven.</p>
    </div>
    <div id="services">
      <div>
        <i class="fas fa-pencil-alt"></i>
        <h1>Designer</h1>
        <p>Ik maak graag nette en overzichtelijke sites met goed bedachte interacties.</p>
        <h6>Dingen die ik leuk vind om te ontwerpen:</h6>
        <p>UX, UI, Webgames, Webapps & Logos</p>
        <h6>Mijn Tools:</h6>
        <p>Visual Studio Code</p>
        <p>Ubuntu</p>
        <p>3 Laptops</p>
        <p>Chrome Devtools</p>
        <p>Pen & Papier</p>
      </div>
      <div>
        <i class="fas fa-flask"></i>
        <h1>Developer</h1>
        <p>Ik werk het liefste met een minimalistische set aan code en tools zodat mijn websites efficient zijn.</p>
        <h6>Ik heb ervaring met:</h6>
        <p>HTML</p>
        <p>CSS</p>
        <p>PHP</p>
        <p><a src="../pokerbot/">Javascript</a></p>
        <p>SQL</p>
        <p>Regex</p>
        <p class="easteregg1">Kerbal OS</p>
        <p></p>
      </div>
      <div>
        <i class="fas fa-gamepad"></i>
        <h1>Gamer</h1>
        <p>Doordat ik mezelf in vrije tijd graag bezig houd met competetieve, strategische en puzzelachtige spellen blijft mijn geest scherp.</p>
        <h6>Ik ben onder andere vaardig in deze spellen:</h6>
        <p>Kerbal Space Program</p>
        <p>Online NLHE Fast Poker tot NL10</p>
        <p>Offworld Trading Company</p>
        <p>Silicon Zero</p>
        <p>Shenzhen I/O</p>
        <p>Mechanized Assault & Exploration</p>
        <p>While True: learn()</p>
      </div>
    </div>
    <div id="preprojects">
      <h1>Mijn Projecten:</h1>
    </div>
    <div class="bluebg">
      <div id="projects">
        <div style="--blueish: #f33; --border: 2px dashed var(--blueish);">
          <img src="svg/mijter.svg"/>
          <div>
            <p></p><p>Maak een verlanglijstje voor sinterklaas. Deel hem met inbegrepen link. Alleen de mensen die de link hebben kunnen hem zien.</p><a href="http://sinterklaasverlanglijstje.herokuapp.com/">Bezoek!</a>
          </div>
        </div>
        <div>
          <img src="svg/cubit32.svg"/>
          <div>
            <p></p><p>Cubit CRM: Mijn eerste poging om een pseudo CRM to maken met Laravel.</p><a href="http://crm-cubit.herokuapp.com/register">Bezoek!</a>
          </div>
        </div>
        <div>
          <img src="svg/balance-scale-solid.svg"/>
          <div>
            <p></p><p>UltraMarkt: Een imitatie van Marktplaats.</p><a href="../ultramarkt/">Bezoek!</a>
          </div>
        </div>
        <div>
          <img src="img/poker-chip-512.png" style="width: auto; left: 14.5%;"/>
          <div>
            <p></p><p>Poker Bot Wars: Programmeer uw eigen poker bot en zet hem los op de competitie!</p><a href="../pokerbot">Bezoek!</a>
          </div>
        </div>
        <div>
          <img src="svg/keyboard-regular.svg"/>
          <div>
            <p></p><p>Scribo Cursim: Leer snel te typen. Uw typesnelheid wordt bijgehouden en u kan zich registeren zodat u uw vooruitgang kan bijhouden en vergelijken met anderen.</p><a href="../ScriboCursim/">Bezoek!</a>
          </div>
        </div>
        <div>
          <img src="svg/home-solid.svg"/>
          <div>
            <p></p><p>GroHousing: vind bijna letterlijk overal in Groningen een kamer.</p><a href="../database/">Bezoek!</a>
          </div>
        </div>
        <div>
          <img src="svg/atom-solid.svg"/>
          <div>
            <p></p><p>Atomsuniverse: een ultra realistische subatomaire deeltjes simulator.</p><a href="../atomsuniverse/">Bezoek!</a>
          </div>
        </div>
        <div>
          <img src="svg/search-minus-solid.svg"/>
          <div>
            <p></p><p>Miniprojects: 1 minuut miniprojecten om bepaalde dingen te testen en om te experimenteren.</p><a href="../miniprojects/">Bezoek!</a>
          </div>
        </div>
      </div>
      <div id="footer">
        <div>
          <a href="mailto:sanderburuma@gmail.com" class="far fa-envelope"></a>
          <a href="https://www.linkedin.com/in/sander-buruma-386a2342/" class="fab fa-linkedin"></a>
          <a href="https://www.facebook.com/sander.buruma" class="fab fa-facebook"></a>
          <a href="https://www.twitter.com/SanderBuruma" class="fab fa-twitter-square"></a>
          <a href="https://github.com/SanderBuruma/cubit32" class="fab fa-github"></a>
        </div>
      </div>
    </div>
  </div>
  <!-- <script defer type="text/javascript" src="main.js"></script> -->
</body>
</html>