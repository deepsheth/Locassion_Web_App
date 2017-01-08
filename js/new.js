var firebaseApp = firebase.initializeApp({
    apiKey: "AIzaSyAVEtHLKbq5hTQy4VK2jzk8GXBZRR1b4VM",
    authDomain: "meet-up-8d278.firebaseapp.com",
    databaseURL: "https://meet-up-8d278.firebaseio.com",
    storageBucket: "meet-up-8d278.appspot.com",
});

// DB References
var db = firebaseApp.database();
var pubEventRef = db.ref('events/public/');



window.onload = function () {

    var vm = new Vue({
        el: '#demo',
        firebase: {
            public_events: {
                source: pubEventRef,
                asObject: false,
                 cancelCallback: function() {
                     genCustCard("Error", "Something went wrong...", "orange");
                 }
            }
        },
        filters: {
            moment: function (time, formatType) {
                switch (formatType) {
                case "day":
                    return moment(time, "YYYY-MM-DD HH:mm:ss").format("ddd");
                    break;
                case "day-num":
                    return moment(time, "YYYY-MM-DD HH:mm:ss").format("D");
                    break;
                case "month":
                    return moment(time, "YYYY-MM-DD HH:mm:ss").format("MMM");
                    break;
                case "context":
                    return moment(time, "YYYY-MM-DD HH:mm:ss").fromNow();
                    break;
                default:
                    return moment(time, "YYYY-MM-DD HH:mm:ss")
                }
            }
        },
        methods: {
//            getAvatar: function (hostID) {
//                var avatarURL = db.ref('users/' + hostID + '/public_info/image');
//                avatarURL.once("value").then(function (avatarURL_snapshot) {
//                    vm.avatar_images.push(avatarURL_snapshot.val());
//                    return avatarURL_snapshot.val();
//                });
//            },
            getAll: function() {
                return console.log(this.public_events);
            },
            getEventURL: function (eventID) {
                return "/webpages/event_details.php?eventid=" + eventID;
            },
             getTagURL: function (tag) {
                return "/webpages/search.php?tag&q=" + tag;
            },
            attendEvent: function (event) {
                console.log("User wishes to attend event: " + event['.key']);
            }
        }
    });

}

function genCustCard(title, body, bgcolor) {
    $('#event-panel').append(
        '<div class="row"><div class="col 12"><div class="card ' + bgcolor + '"><div class="card-content white-text"><span class="card-title">' + title + '</span><p class="insert">' + body + '</p></div></div></div></div>'
    );
}