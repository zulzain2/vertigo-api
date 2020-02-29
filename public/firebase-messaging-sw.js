importScripts('https://www.gstatic.com/firebasejs/7.9.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.9.1/firebase-messaging.js');

const firebaseConfig = {
    apiKey: "AIzaSyBwzH3ORW0DB6wWaJ6y0YILgoE8qukOOco",
    authDomain: "vertigo-2020.firebaseapp.com",
    databaseURL: "https://vertigo-2020.firebaseio.com",
    projectId: "vertigo-2020",
    storageBucket: "vertigo-2020.appspot.com",
    messagingSenderId: "15333066764",
    appId: "1:15333066764:web:335016e9c10981f2980629",
    measurementId: "G-V22MJ22RQP"
  };

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

var messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {
    console.log('[firebase-messaging-sw.js] Received background message' , payload);

    var notificationTitle = 'Background Message Title';
    var notificationOptions = {
        body : 'Background Message body.' ,
        icon : '/firebase-logo.png'
    };

    return self.ServiceWorkerRegistration.showNotification(notificationTitle,
        notificationOptions);
});