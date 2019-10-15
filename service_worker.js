const staticCacheName = 'site-static';
const assets = [
   //halaman
    'http://localhost/web-nilai',
    'http://localhost/web-nilai/admin',
    'http://localhost/web-nilai/admin/daftar-guru',
    'http://localhost/web-nilai/admin/daftar-siswa',
   //css
   'http://localhost/web-nilai/public/css/custom-style.css',
   'http://localhost/web-nilai/public/css/font-awesome.min.css',
   'http://localhost/web-nilai/public/css/material-dashboard.min.css',
   'http://localhost/web-nilai/public/vendor/material-dashboard/material-dashboard.css',
   'http://localhost/web-nilai/public/vendor/datatables/datatables.min.css',

   //js
   'http://localhost/web-nilai/public/vendor/js/core/jquery.min.js',
   'http://localhost/web-nilai/public/vendor/js/core/bootstrap-material-design.min.js',
   'http://localhost/web-nilai/public/vendor/js/core/popper.min.js',
   'http://localhost/web-nilai/public/js/filter-funct.js',
   'http://localhost/web-nilai/public/js/my-script.js',

   'http://localhost/web-nilai/public/vendor/datatables/datatables.min.js',
   'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons',
   'https://unpkg.com/sweetalert/dist/sweetalert.min.js'

];

//install 
self.addEventListener('install', evt =>{

   evt.waitUntil(
      caches.open(staticCacheName).then(cache => {
         //console.log('caching shell asset');
         cache.addAll(assets);
      })
   );
});

//activate
self.addEventListener('activate', evt =>{
   //console.log('service worker has been installed');
   evt.waitUntil(
      caches.keys().then(keys => {
        //console.log('keys');

      })
    )
});

//fetch
self.addEventListener('fetch', evt =>{
   //console.log('fetch event', evt);
   evt.respondWith(
      caches.match(evt.request).then(cacheRes => {
         return cacheRes || fetch(evt.request);
      })
   )
});