// Your web app's Firebase configuration
// const firebaseConfig = {
//     apiKey: "AIzaSyBwzH3ORW0DB6wWaJ6y0YILgoE8qukOOco",
//     authDomain: "vertigo-2020.firebaseapp.com",
//     databaseURL: "https://vertigo-2020.firebaseio.com",
//     projectId: "vertigo-2020",
//     storageBucket: "vertigo-2020.appspot.com",
//     messagingSenderId: "15333066764",
//     appId: "1:15333066764:web:335016e9c10981f2980629",
//     measurementId: "G-V22MJ22RQP"
//   };

  const firebaseConfig = {
    apiKey: "AIzaSyCxpXCtamchXkyj34eLyOr-B1VGtWpBMqs",
    authDomain: "vertigo-tech.firebaseapp.com",
    databaseURL: "https://vertigo-tech.firebaseio.com",
    projectId: "vertigo-tech",
    storageBucket: "vertigo-tech.appspot.com",
    messagingSenderId: "1079350481363",
    appId: "1:1079350481363:web:e1e1fb5605ab5953ff9f26",
    measurementId: "G-2ZKDMD8T86"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

 // Retrieve Firebase Messaging object.
 const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function () {

                console.log("Notification permission granted.");
                return messaging.getToken()

            }).then(function(token){

                $('#device_token').val(token);
                console.log(token)
              
            }).

            catch(function (err) {

                console.log("Unable to get permission to notify." , err);
            });

messaging.onMessage((payload) => {

    console.log(payload);
})


