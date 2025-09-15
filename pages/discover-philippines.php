<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}

// Include auth functions
require_once '../src/auth.php';

// Fetch user by ID
$user = getUserById($_SESSION['user_id']);
if (!$user) {
    // Invalid user, logout
    session_destroy();
    header('Location: ../index.php');
    exit;
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Discover Philippines — ParadiseEscape</title>
  <meta name="description" content="Discover beautiful destinations, scenery and travel highlights across the Philippines." />

  <!-- Tailwind CDN (for quick prototyping) -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Small custom styles */
    .hero-bg { background-image: linear-gradient(90deg, rgba(0,0,0,0.35), rgba(0,0,0,0.12)), url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&s='); background-size: cover; background-position: center; }
    .card-shadow { box-shadow: 0 6px 20px rgba(10,20,30,0.08); }
    .grid-image { aspect-ratio: 16/11; object-fit: cover; width: 100%; }
  </style>
</head>
<body class="antialiased text-slate-800 bg-slate-50">
<?php include "../includes/header.php"; ?>

  <!-- HERO -->
  <section class="hero-bg min-h-screen flex items-center pt-20">
    <div class="max-w-7xl mx-auto px-6 py-28 text-white">
      <div class="max-w-3xl">
        <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight">Discover the Philippines</h1>
        <p class="mt-4 text-lg opacity-90">Explore pristine beaches, lush mountains, centuries-old terraces, and vibrant culture — your next paradise starts here.</p>
        <div class="mt-8 flex gap-4">
          <a href="#destinations" class="inline-flex items-center gap-2 bg-white/95 text-slate-900 px-5 py-3 rounded-md font-medium shadow hover:scale-[1.01] transition">Start Exploring</a>
          <a href="#gallery" class="inline-flex items-center gap-2 border border-white/70 px-4 py-3 rounded-md">Watch Reel</a>
        </div>
        <div class="mt-6 text-sm opacity-80">Tip: Scroll down to view featured destinations and an interactive map.</div>
      </div>
    </div>
  </section>

  <!-- CONTENT -->
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16">

    <!-- Featured Destinations -->
    <section id="destinations" class="bg-white rounded-2xl p-6 card-shadow">
      <div class="flex items-center justify-between">
        <div>
          <h2 class="text-2xl font-semibold">Featured Destinations</h2>
          <p class="mt-1 text-sm text-slate-500">Handpicked places to help you plan the perfect trip.</p>
        </div>
        <div class="hidden sm:flex gap-3">
          <button class="px-3 py-2 rounded-md border">All</button>
          <button class="px-3 py-2 rounded-md border">Beaches</button>
          <button class="px-3 py-2 rounded-md border">Mountains</button>
        </div>
      </div>

      <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Card 1 -->
        <article class="bg-white rounded-lg overflow-hidden">
          <img loading="lazy" class="grid-image" src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=1600&auto=format&fit=crop&ixlib=rb-4.0.3&s=" alt="El Nido Palawan" />
          <div class="p-4">
            <h3 class="font-semibold">El Nido, Palawan</h3>
            <p class="mt-2 text-sm text-slate-600">Limestone cliffs, secret lagoons and turquoise waters — a true island playground.</p>
            <div class="mt-4 flex items-center justify-between">
              <a href="#" class="text-rose-500 font-medium">Learn more →</a>
              <div class="text-xs text-slate-400">Best time: Nov–May</div>
            </div>
          </div>
        </article>

        <!-- Card 2 -->
        <article class="bg-white rounded-lg overflow-hidden">
          <img loading="lazy" class="grid-image" src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1600&auto=format&fit=crop&ixlib=rb-4.0.3&s=" alt="Banaue Rice Terraces" />
          <div class="p-4">
            <h3 class="font-semibold">Banaue Rice Terraces</h3>
            <p class="mt-2 text-sm text-slate-600">2,000-year-old terraces carved into the mountains — UNESCO cultural treasure.</p>
            <div class="mt-4 flex items-center justify-between">
              <a href="#" class="text-rose-500 font-medium">Learn more →</a>
              <div class="text-xs text-slate-400">Best time: Nov–Apr</div>
            </div>
          </div>
        </article>

        <!-- Card 3 -->
        <article class="bg-white rounded-lg overflow-hidden">
          <img loading="lazy" class="grid-image" src="https://images.unsplash.com/photo-1526772662000-3f88f10405ff?q=80&w=1600&auto=format&fit=crop&ixlib=rb-4.0.3&s=" alt="Boracay Beach" />
          <div class="p-4">
            <h3 class="font-semibold">Boracay</h3>
            <p class="mt-2 text-sm text-slate-600">Famed white-sand beaches, clear water and vibrant nightlife.</p>
            <div class="mt-4 flex items-center justify-between">
              <a href="#" class="text-rose-500 font-medium">Learn more →</a>
              <div class="text-xs text-slate-400">Best time: Nov–May</div>
            </div>
          </div>
        </article>

        <!-- Card 4 -->
        <article class="bg-white rounded-lg overflow-hidden">
          <img loading="lazy" class="grid-image" src="https://images.unsplash.com/photo-1518684079-69a2c2a5f7d1?q=80&w=1600&auto=format&fit=crop&ixlib=rb-4.0.3&s=" alt="Siargao" />
          <div class="p-4">
            <h3 class="font-semibold">Siargao</h3>
            <p class="mt-2 text-sm text-slate-600">Surfing capital with lagoons and laid-back island vibes.</p>
            <div class="mt-4 flex items-center justify-between">
              <a href="#" class="text-rose-500 font-medium">Learn more →</a>
              <div class="text-xs text-slate-400">Best time: Mar–Oct</div>
            </div>
          </div>
        </article>

        <!-- Card 5 -->
        <article class="bg-white rounded-lg overflow-hidden">
          <img loading="lazy" class="grid-image" src="https://images.unsplash.com/photo-1526481280698-5b7bd4d7f3b8?q=80&w=1600&auto=format&fit=crop&ixlib=rb-4.0.3&s=" alt="Chocolate Hills Bohol" />
          <div class="p-4">
            <h3 class="font-semibold">Bohol</h3>
            <p class="mt-2 text-sm text-slate-600">Chocolate Hills, tarsiers and friendly island communities.</p>
            <div class="mt-4 flex items-center justify-between">
              <a href="#" class="text-rose-500 font-medium">Learn more →</a>
              <div class="text-xs text-slate-400">Best time: Dec–May</div>
            </div>
          </div>
        </article>

        <!-- Card 6 -->
        <article class="bg-white rounded-lg overflow-hidden">
          <img loading="lazy" class="grid-image" src="https://images.unsplash.com/photo-1599058917212-8f9d8a1f6f4d?q=80&w=1600&auto=format&fit=crop&ixlib=rb-4.0.3&s=" alt="Cebu Whale Shark" />
          <div class="p-4">
            <h3 class="font-semibold">Cebu</h3>
            <p class="mt-2 text-sm text-slate-600">Diving, whale sharks and historic cityscapes — a little bit of everything.</p>
            <div class="mt-4 flex items-center justify-between">
              <a href="#" class="text-rose-500 font-medium">Learn more →</a>
              <div class="text-xs text-slate-400">Best time: Jan–May</div>
            </div>
          </div>
        </article>

      </div>
    </section>

    <!-- Map + Highlights -->
    <section class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
      <div class="lg:col-span-2 bg-white rounded-2xl p-4 card-shadow">
        <h3 class="font-semibold">Interactive Map</h3>
        <p class="mt-1 text-sm text-slate-500">Click pins to learn about each destination.</p>
        <div class="mt-4 overflow-hidden rounded-lg h-96">
          <!-- NOTE: Replace the src with your Google Maps Embed key / location set -->
          <iframe
            class="w-full h-full border-0"
            src="https://www.google.com/maps/d/embed?mid=1&hl=en"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="Philippines map"
          ></iframe>
        </div>
      </div>

      <aside class="bg-white rounded-2xl p-4 card-shadow">
        <h4 class="font-semibold">Travel Highlights</h4>
        <ul class="mt-3 space-y-3 text-sm text-slate-600">
          <li>✓ Best beaches: Palawan, Boracay, Siargao</li>
          <li>✓ Cultural sites: Intramuros (Manila), Banaue, Vigan</li>
          <li>✓ Adventure: Sagada caves, Mount Pulag, canyoneering (Cebu)</li>
          <li>✓ Food & festivals: Lechon in Cebu, Sinulog, Ati-Atihan</li>
        </ul>

        <div class="mt-4">
          <a href="#contact" class="inline-block px-4 py-2 rounded-md bg-rose-500 text-white">Plan my trip</a>
        </div>
      </aside>
    </section>

    <!-- Gallery -->
    <section id="gallery" class="mt-8 bg-white rounded-2xl p-4 card-shadow">
      <div class="flex items-center justify-between">
        <h3 class="font-semibold">Photo Gallery</h3>
        <div class="text-sm text-slate-500">Click images to open lightbox</div>
      </div>

      <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
        <!-- Thumbnails -->
        <button class="group overflow-hidden rounded-lg" onclick="openLightbox(0)"><img loading="lazy" class="w-full h-28 object-cover group-hover:scale-105 transition" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=800&auto=format&fit=crop&ixlib=rb-4.0.3&s=" alt="beach"/></button>
        <button class="group overflow-hidden rounded-lg" onclick="openLightbox(1)"><img loading="lazy" class="w-full h-28 object-cover group-hover:scale-105 transition" src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=800&auto=format&fit=crop&ixlib=rb-4.0.3&s=" alt="lagoon"/></button>
        <button class="group overflow-hidden rounded-lg" onclick="openLightbox(2)"><img loading="lazy" class="w-full h-28 object-cover group-hover:scale-105 transition" src="https://images.unsplash.com/photo-1526481280698-5b7bd4d7f3b8?q=80&w=800&auto=format&fit=crop&ixlib=rb-4.0.3&s=" alt="hills"/></button>
        <button class="group overflow-hidden rounded-lg" onclick="openLightbox(3)"><img loading="lazy" class="w-full h-28 object-cover group-hover:scale-105 transition" src="https://images.unsplash.com/photo-1518684079-69a2c2a5f7d1?q=80&w=800&auto=format&fit=crop&ixlib=rb-4.0.3&s=" alt="surf"/></button>
        <button class="group overflow-hidden rounded-lg" onclick="openLightbox(4)"><img loading="lazy" class="w-full h-28 object-cover group-hover:scale-105 transition" src="https://images.unsplash.com/photo-1606787366850-de6330128bfc?q=80&w=800&auto=format&fit=crop&ixlib=rb-4.0.3&s=" alt="rice terraces"/></button>
        <button class="group overflow-hidden rounded-lg" onclick="openLightbox(5)"><img loading="lazy" class="w-full h-28 object-cover group-hover:scale-105 transition" src="https://images.unsplash.com/photo-1544010303-6e7f6a4a2a8a?q=80&w=800&auto=format&fit=crop&ixlib=rb-4.0.3&s=" alt="city"/></button>
      </div>

      <!-- Lightbox -->
      <div id="lightbox" class="fixed inset-0 bg-black/70 hidden items-center justify-center p-4 z-50">
        <div class="max-w-4xl w-full bg-white rounded-lg overflow-hidden">
          <div class="relative">
            <button onclick="closeLightbox()" class="absolute top-3 right-3 bg-white/80 hover:bg-white p-2 rounded-full">✕</button>
            <img id="lightboxImg" src="" alt="expanded" class="w-full h-96 object-cover" />
          </div>
          <div class="p-4 flex justify-between items-center">
            <div id="lightboxCaption" class="text-sm text-slate-600"></div>
            <div>
              <button onclick="prevImg()" class="px-3 py-2 rounded border mr-2">Prev</button>
              <button onclick="nextImg()" class="px-3 py-2 rounded border">Next</button>
            </div>
          </div>
        </div>
      </div>

    </section>

    <!-- CTA -->
    <section class="mt-8 rounded-2xl overflow-hidden card-shadow">
      <div class="relative">
        <img loading="lazy" src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?q=80&w=2000&auto=format&fit=crop&ixlib=rb-4.0.3&s=" alt="sunset" class="w-full h-64 object-cover brightness-75" />
        <div class="absolute inset-0 flex items-center justify-center">
          <div class="text-center text-white p-6">
            <h3 class="text-2xl font-semibold">Your Paradise Awaits</h3>
            <p class="mt-2 text-sm opacity-90">Start planning your trip to the Philippines today.</p>
            <a href="#contact" class="mt-4 inline-block px-5 py-3 bg-rose-500 rounded-md text-white">Book Your Escape</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact / Footer -->
    <section id="contact" class="mt-8 bg-white rounded-2xl p-6 card-shadow">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div>
          <h4 class="text-lg font-semibold">Get in touch</h4>
          <p class="mt-2 text-sm text-slate-600">Questions, custom itineraries or group travel? Send us a message.</p>
        </div>
        <form class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-4" onsubmit="event.preventDefault(); alert('Thanks — form submission stub (replace with real integration).')">
          <input class="p-3 rounded border" placeholder="Your name" required />
          <input class="p-3 rounded border" placeholder="Email" type="email" required />
          <input class="p-3 rounded border col-span-2" placeholder="Subject" />
          <textarea class="p-3 rounded border col-span-2" placeholder="Message" rows="4"></textarea>
          <div class="col-span-2 text-right">
            <button class="px-4 py-2 bg-rose-500 text-white rounded">Send message</button>
          </div>
        </form>
      </div>

      <footer class="mt-6 border-t pt-4 text-sm text-slate-500 flex items-center justify-between">
        <div>© ParadiseEscape — Discover Philippines 2025</div>
        <div class="space-x-3">
          <a href="#" class="hover:underline">Privacy</a>
          <a href="#" class="hover:underline">Terms</a>
        </div>
      </footer>
    </section>

  </main>

  <script>
    // Mobile nav toggle (simple)
    document.getElementById('mobileBtn').addEventListener('click', () => {
      alert('Mobile menu placeholder — implement slideout if needed.');
    });

    // Lightbox logic
    const gallery = [
      {src:'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=2000&auto=format&fit=crop&ixlib=rb-4.0.3&s=', caption:'Sun-kissed beach'},
      {src:'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=2000&auto=format&fit=crop&ixlib=rb-4.0.3&s=', caption:'Hidden lagoon'},
      {src:'https://images.unsplash.com/photo-1526481280698-5b7bd4d7f3b8?q=80&w=2000&auto=format&fit=crop&ixlib=rb-4.0.3&s=', caption:'Chocolate Hills'},
      {src:'https://images.unsplash.com/photo-1518684079-69a2c2a5f7d1?q=80&w=2000&auto=format&fit=crop&ixlib=rb-4.0.3&s=', caption:'Surf break'},
      {src:'https://images.unsplash.com/photo-1606787366850-de6330128bfc?q=80&w=2000&auto=format&fit=crop&ixlib=rb-4.0.3&s=', caption:'Rice terraces'},
      {src:'https://images.unsplash.com/photo-1544010303-6e7f6a4a2a8a?q=80&w=2000&auto=format&fit=crop&ixlib=rb-4.0.3&s=', caption:'City skyline'}
    ];
    let current = 0;
    function openLightbox(i){ current = i; document.getElementById('lightboxImg').src = gallery[i].src; document.getElementById('lightboxCaption').innerText = gallery[i].caption; document.getElementById('lightbox').classList.remove('hidden'); document.getElementById('lightbox').classList.add('flex'); }
    function closeLightbox(){ document.getElementById('lightbox').classList.remove('flex'); document.getElementById('lightbox').classList.add('hidden'); }
    function nextImg(){ current = (current+1) % gallery.length; openLightbox(current); }
    function prevImg(){ current = (current-1 + gallery.length) % gallery.length; openLightbox(current); }

    // Simple accessibility: close lightbox on ESC
    document.addEventListener('keydown', (e) => { if(e.key === 'Escape'){ closeLightbox(); } });
  </script>
</body>
</html>
