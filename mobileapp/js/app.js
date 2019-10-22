var app = new Framework7({
  // App root element
  root: '#app',
  // App Name
  name: 'My App',
  // App id
  id: 'com.myapp.test',
  // Enable swipe panel
  panel: {
    swipe: 'left',
  },
  // Add default routes
  routes: [
    
    {
      path: '/index/',
      componentUrl: 'index.html',
    },
    {
      path: '/menu/',
      componentUrl: '/menu.html',
    },
    {
      path: '/filter/',
      componentUrl: '/filter.html',
    },
    {
      path: '/actie-dva/',
      componentUrl: '/actie.html',
    },
    {
      path: '/eten/',
      componentUrl: '/eten.html',
    },
    {
      path: '/options/',
      componentUrl: '/options.html',
    },
    {
      path: '/add/',
      componentUrl: '/dodavanje.html',
    },
    {
      path: '/library/',
      componentUrl: 'pages/library.html',
    },
    {
      path: '/cart/',
      componentUrl: '/cart.html',
    },
    {
      path: '/payment-check/',
      componentUrl: '/payment-check.html',
    },
    {
      path: '/payment-check2/',
      componentUrl: '/payment-check2.html',
    },
    {
      path: '/video/',
      componentUrl: 'pages/video.html',
    },
    {
      path: '/menu2/',
      componentUrl: 'pages/menu2.html',
    },
    {
      path: '/reviews/',
      componentUrl: '/reviews.html',
    },
    {
      path: '/danger/',
      componentUrl: '/danger.html',
    },
    {
      path: '/radio/',
      componentUrl: 'pages/radio.html',
    },
  ],
  // ... other parameters
});

var mainView = app.views.create('.view-main');
var $$ = Dom7;

var mainView = app.views.create('.view-main');

var notificationClickToClose = app.notification.create({
  icon: '<i class="icon demo-icon">7</i>',
  title: 'Framework7',
  titleRightText: 'now',
  subtitle: 'Notification with close on click',
  text: 'Click me to close',
  closeOnClick: true,
});
$$('.open-click-to-close').on('click', function () {
  notificationClickToClose.open();
});