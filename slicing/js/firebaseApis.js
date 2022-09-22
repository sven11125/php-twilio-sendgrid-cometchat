function initializeFirebase() {

    export const initFirebase = () => {
        let config = {
            /* apiKey: 'AIzaSyBkasdasdasdybyI-ZkFCxNpJLAtYyqeERw5I60yTNs',
            authDomain: 'testAPP.firebaseapp.com',
            databaseURL: 'https://testAPP.firebaseio.com',
            projectId: 'testAPP-229414',
            storageBucket: 'testAPP.appspot.com',
            messagingSenderId: 'app_sender_id'*/
            apiKey: "AIzaSyCqSmapEIWl6FABxSZqsjVk2ZZtvFfL38A",
            authDomain: "wonachat-b091a.firebaseapp.com",
            databaseURL: "https://wonachat-b091a.firebaseio.com",
            projectId: "wonachat-b091a",
            storageBucket: "wonachat-b091a.appspot.com",
            messagingSenderId: "753553654310",
            appId: "1:753553654310:web:830b8a142bf485c87d1ce7",
            measurementId: "G-C7J3WCK3VZ"
        };

        /*firebase.initializeApp(config);*/
          firebase.initializeApp(config);
          firebase.analytics();
    };

    requestPermission()
}

function requestPermission() {

    let messaging = firebase.messaging();

    messaging
        .requestPermission()
        .then(() => {
            console.log('Have Permission');
            return messaging.getToken();
        })
        .then(token => {
            console.log('FCM Token:', token);
            //Do something with TOken like subscribe to topics
        })
        .catch(error => {
            if (error.code === 'messaging/permission-blocked') {
                console.log('Please Unblock Notification Request Manually');
            } else {
                console.log('Error Occurred', error);
            }
        });
}

function SubscribeToUser() {

    let token = 'generated_FCM_token';

    CometChat.getAppSettings().then(settings => {

        let appToken = settings.extensions[0].appToken;
        let userType = 'user';
        let UID = 'UID';
        let appId = 'APP_ID';
        let region = 'REGION_OF_APP';
        let topic = appId + '_' + userType + '_' + UID;
        let url = 'https://push-notification-' + region + '.cometchat.io/v1/subscribe?appToken=' + appToken + '';

        fetch(url, {
            method: 'POST',
            headers: new Headers({
                'Content-Type': 'application/json'
            }),
            body: JSON.stringify({appId: appId, fcmToken: token, topic: topic})
        })
            .then(response => {
                if (response.status < 200 || response.status >= 400) {
                    console.log(
                        'Error subscribing to topic: ' +
                        response.status +
                        ' - ' +
                        response.text()
                    );
                }

                console.log('Subscribed to "' + topic + '"');
            })
            .catch(error => {
                console.error(error);
            });
    });
}

function SubscribeToGroup() {

    let token = 'generated_FCM_token';

    CometChat.getAppSettings().then(settings => {

        let appToken = settings.extensions[0].appToken;
        let userType = 'group';
        let GUID = 'GUID';
        let appId = 'APP_ID';
        let region = 'REGION_OF_APP';
        let topic = appId + '_' + userType + '_' + GUID;
        let url = 'https://push-notification-' + region + '.cometchat.io/v1/subscribe?appToken=' + appToken + '';

        fetch(url, {
            method: 'POST',
            headers: new Headers({
                'Content-Type': 'application/json'
            }),
            body: JSON.stringify({appId: appId, fcmToken: token, topic: topic})
        })
            .then(response => {
                if (response.status < 200 || response.status >= 400) {
                    console.log(
                        'Error subscribing to topic: ' +
                        response.status +
                        ' - ' +
                        response.text()
                    );
                }

                console.log('Subscribed to "' + topic + '"');
            })
            .catch(error => {
                console.error(error);
            });
    });
}

function ReceiveMessage() {

    firebase.messaging().onMessage(function (payload) {
        // Customize notification here
        let notificationTitle = 'Notification title';
        let notificationOptions = {
            body: payload.data.alert,
            icon: ''
        };

        let notification = new Notification(notificationTitle, notificationOptions);

        notification.onclick = function (event) {
            notification.close();
            //handle click event onClick on Web Push Notification
        };
    });
}

function UnsubscribeFromTopicUser() {

    let token = 'generated_FCM_token';

    CometChat.getAppSettings().then(settings => {

        let appToken = settings.extensions[0].appToken;
        let userType = 'user';
        let UID = 'UID';
        let appId = 'APP_ID';
        let region = 'REGION_OF_APP';
        let topic = appId + '_' + userType + '_' + UID;
        let url = 'https://push-notification-' + region + '.cometchat.io/v1/unsubscribe?appToken=' + appToken;

        fetch(url, {
            method: 'DELETE',
            headers: new Headers({
                'Content-Type': 'application/json'
            }),
            body: JSON.stringify({appId: appId, fcmToken: token, topic: topic})
        })
            .then(response => {
                if (response.status < 200 || response.status >= 400) {
                    console.log(
                        'Error subscribing to topic: ' +
                        response.status +
                        ' - ' +
                        response.text()
                    );
                } else {
                    console.log('Unsubscribed from "' + topic + '"');
                }
            })
            .catch(error => {
                console.error(error);
            });
    });
}

function UnsubscribeFromTopicGroup() {

    let token = 'generated_FCM_token';

    CometChat.getAppSettings().then(settings => {

        let appToken = settings.extensions[0].appToken;
        let userType = 'group';
        let GUID = 'GUID';
        let appId = 'APP_ID';
        let region = 'REGION_OF_APP';
        let topic = appId + '_' + userType + '_' + GUID;
        let url = 'https://push-notification-' + region + '.cometchat.io/v1/unsubscribe?appToken=' + appToken;

        fetch(url, {
            method: 'DELETE',
            headers: new Headers({
                'Content-Type': 'application/json'
            }),
            body: JSON.stringify({ appId: appId, fcmToken: token, topic: topic })
        })
            .then(response => {
                if (response.status < 200 || response.status >= 400) {
                    console.log(
                        'Error subscribing to topic: ' +
                        response.status +
                        ' - ' +
                        response.text()
                    );
                } else {
                    console.log('Unsubscribed from "' + topic + '"');
                }
            })
            .catch(error => {
                console.error(error);
            });
    });
}