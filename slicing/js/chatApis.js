const APP_ID = '1430499b11ee649';
const REGION = 'eu';
const API_KEY = '029c53a23201a8e01a15e1ff3e2fa86f6ab48006';

function initCometchat(callback) {

    let appSetting = new CometChat.AppSettingsBuilder().subscribePresenceForAllUsers().setRegion(REGION).build();

    CometChat.init(APP_ID, appSetting).then(
        () => {
            console.log('Initialization completed successfully');
            callback(true)
        },
        error => {
            console.log('Initialization failed with error:', error);
            callback(false)
        }
    );
}


/**   ==========   Auth   ===========   */

function userLogin(uid, callback) {
    CometChat.login(uid, API_KEY).then(
        user => {
            console.log('Login Successful:', {user});
            callback(true)
        },
        error => {
            console.log('Login failed with exception:', {error});
            callback(false)
        }
    );
}


/**   ==========   Users   ==========   */

function creatingAUser(uid, name, callback) {

    let user = new CometChat.User(uid);
    user.setName(name);

    CometChat.createUser(user, API_KEY).then(
        user => {
            console.log('user created', user);
            callback(true, user)
        }, error => {
            console.log('error', error);
            callback(false, error)
        }
    )
}

function updatingAUser(uid, name, callback) {

    let user = new CometChat.User(uid);
    user.setName(name);

    CometChat.updateUser(user, API_KEY).then(
        user => {
            console.log('user updated', user);
            callback(true, user)
        }, error => {
            console.log('error', error);
            callback(false, error)
        }
    )
}

function getLoggedInUser(callback) {

    let user = CometChat.getLoggedinUser().then(
        user => {
            console.log('user details:', {user});
            callback(true, user)
        },
        error => {
            console.log('error getting details:', {error});
            callback(false, error)
        }
    );
}

function getParticularUser(uid, callback) {

    CometChat.getUser(uid).then(
        user => {
            console.log('User details fetched for user:', user);
            callback(true, user)
        },
        error => {
            console.log('User details fetching failed with error:', error);
            callback(false, error)
        }
    );
}

function userList(searchString, callback) {

    let usersRequest;

    if (searchString === 'all') {
        usersRequest = new CometChat.UsersRequestBuilder().setLimit(100).build();
    } else {
        usersRequest = new CometChat.UsersRequestBuilder()
            .setLimit(50)
            .setSearchKeyword(searchString)
            .build();
    }

    usersRequest.fetchNext().then(
        userList => {
            console.log('User list received:', userList);
            callback(true, userList)
        },
        error => {
            console.log('User list fetching failed with error:', error);
            callback(false, error)
        }
    );
}

function userStatusList(status, callback) {

    let usersRequest = new CometChat.UsersRequestBuilder()
        .setLimit(50)
        .setStatus(status === 'online' ? CometChat.USER_STATUS.ONLINE : CometChat.USER_STATUS.OFFLINE)
        .build();

    usersRequest.fetchNext().then(
        userList => {
            console.log('User list received:', userList);
            callback(true, userList)
        },
        error => {
            console.log('User list fetching failed with error:', error);
            callback(false, error)
        }
    );
}

function hideBlockedUserList(callback) {

    let usersRequest = new CometChat.UsersRequestBuilder()
        .setLimit(50)
        .hideBlockedUsers(true)
        .build();

    usersRequest.fetchNext().then(
        userList => {
            console.log('User list received:', userList);
            callback(true, userList)
        },
        error => {
            console.log('User list fetching failed with error:', error);
            callback(false, error)
        }
    );
}

function userRoleList(role, callback) {

    let usersRequest = new UsersRequest.UsersRequestBuilder()
        .setLimit(50)
        .setRole(role)
        .build();

    usersRequest.fetchNext().then(
        userList => {
            /* userList will be the list of User class. */
            console.log('User list received:', userList);
            /* retrived list can be used to display contact list. */
            callback(true, userList)
        },
        error => {
            console.log('User list fetching failed with error:', error);
            callback(false, error)
        }
    );
}

function userFriendList(callback) {

    let usersRequest = new UsersRequest.UsersRequestBuilder()
        .setLimit(50)
        .friendsOnly(true)
        .build();

    usersRequest.fetchNext().then(
        userList => {
            /* userList will be the list of User class. */
            console.log('User list received:', userList);
            /* retrived list can be used to display contact list. */
            callback(true, userList)
        },
        error => {
            console.log('User list fetching failed with error:', error);
            callback(false, error)
        }
    );

}


/**   ==========   Messaging   ==========   */

function getMissedMessages(uid) {

    let latestId;

    CometChat.getLastDeliveredMessageId().then(msgId => {
        latestId = msgId;
    });

    let messagesRequest = new CometChat.MessagesRequestBuilder()
        .setMessageId(latestId)
        .setLimit(50)
        .build();

    messagesRequest.fetchNext().then(
        messages => {
            console.log('Message list fetched:', messages);
        },
        error => {
            console.log('Message fetching failed with error:', error);
        }
    );
}

function searchMessages() {

    let messagesRequest = new CometChat.MessagesRequestBuilder()
        .setLimit(50)
        .setSearchKeyword('Hello')
        .build();

    messagesRequest.fetchPrevious().then(
        messages => {
            console.log('SearchMessages list fetched:', messages);
            // Handle the list of messages
        },
        error => {
            console.log('SearchMessages fetching failed with error:', error);
        }
    );
}


/**   ==========   Message History   ==========   */

function getMessageHistoryOfAll(callback) {

    let messagesRequest = new CometChat.MessagesRequestBuilder()
        .setLimit(100)
        .build();

    messagesRequest.fetchPrevious().then(
        messages => {
            console.log('MessageHistoryOfAll list fetched:', messages);
            callback(true, messages)
        },
        error => {
            console.log('MessageHistoryOfAll fetching failed with error:', error);
            callback(false, error)
        }
    );
}

function getMessageHistoryOfParticularUser(opponent_uid, callback) {

    let messagesRequest = new CometChat.MessagesRequestBuilder()
        .setLimit(100)
        .setUID(opponent_uid)
        .build();

    messagesRequest.fetchPrevious().then(
        messages => {
            console.log('MessageHistoryOf ' + opponent_uid + ' list fetched:', messages);
            callback(true, opponent_uid, messages)
        },
        error => {
            console.log('MessageHistoryOf ' + opponent_uid + ' fetching failed with error:', error);
            callback(false, opponent_uid, error)
        }
    );
}

function getMessageHistoryOfParticularGroup(guid) {

    let messagesRequest = new CometChat.MessagesRequestBuilder()
        .setLimit(50)
        .setGUID(guid)
        .build();

    messagesRequest.fetchPrevious().then(
        messages => {
            console.log('Message list fetched:', messages);
        },
        error => {
            console.log('Message fetching failed with error:', error);
        }
    );
}


/**   ==========   Unread Message   ==========   */

function getUnreadMessagesForAll(callback) {

    let messagesRequest = new CometChat.MessagesRequestBuilder()
        .setUnread(true)
        .setLimit(50)
        .build();

    messagesRequest.fetchPrevious().then(
        messages => {
            console.log('UnreadMessagesForAll list fetched:', messages);
            callback(true, messages)
        },
        error => {
            console.log('UnreadMessagesForAll fetching failed with error:', error);
            callback(false, error)
        }
    );
}

function getUnreadMessagesForUser(opponent_uid, callback) {

    let messagesRequest = new CometChat.MessagesRequestBuilder()
        .setUnread(true)
        .setUID(opponent_uid)
        .setLimit(100)
        .build();

    messagesRequest.fetchPrevious().then(
        messages => {
            console.log('UnreadMessagesFor ' + opponent_uid + ' list fetched:', messages);
            callback(true, opponent_uid, messages)
        },
        error => {
            console.log('UnreadMessagesFor ' + opponent_uid + ' fetching failed with error:', error);
            callback(false, opponent_uid, error)
        }
    );
}

function getUnreadMessagesForGroup(guid, callback) {

    let messagesRequest = new CometChat.MessagesRequestBuilder()
        .setUnread(true)
        .setGUID(guid)
        .setLimit(50)
        .build();

    messagesRequest.fetchPrevious().then(
        messages => {
            console.log('UnreadMessagesForGroup list fetched:', messages);
            callback(true, messages)
        },
        error => {
            console.log('UnreadMessagesForGroup fetching failed with error:', error);
            callback(false, error)
        }
    );
}

function getUnreadMessageCountForAll(callback) {

    CometChat.getUnreadMessageCount().then(
        array => {
            console.log('UnreadMessageCountForAll fetched', array);
            callback(true, array)
        },
        error => {
            console.log('Error in getting unreadMessageCountForAll', error);
            callback(false, error)
        }
    );
}

function getUnreadMessageCountForAllUsers(callback) {

    CometChat.getUnreadMessageCountForAllUsers().then(
        array => {
            console.log('UnreadMessageCountForAllUsers fetched', array);
            callback(true, array)
        },
        error => {
            console.log('Error in getting unreadMessageCountForAllUsers', error);
            callback(false, error)
        }
    );
}

function getUnreadMessageCountForAllGroups(callback) {

    CometChat.getUnreadMessageCountForAllGroups().then(
        array => {
            console.log('UnreadMessageCountForAllGroups fetched', array);
            callback(true, array)
        },
        error => {
            console.log('Error in getting unreadMessageCountForAllGroups', error);
            callback(false, error)
        }
    );
}

function getUnreadMessageCountForUser(uid, callback) {

    CometChat.getUnreadMessageCountForUser(uid).then(
        array => {
            console.log('UnreadMessageCountForUser fetched', array);
            callback(true, array)
        },
        error => {
            console.log('Error in getting unreadMessageCountForUser', error);
            callback(false, error)
        }
    );
}

function getUnreadMessageCountForGroup(guid, callback) {

    CometChat.getUnreadMessageCountForGroup(guid).then(
        array => {
            console.log('UnreadMessageCountForGroup fetched', array);
            callback(true, array)
        },
        error => {
            console.log('Error in getting unreadMessageCountForGroup', error);
            callback(false, error)
        }
    );
}


/**   ==========   Send Message   ==========   */

function sendTextMessageToUser(opponent_uid, messageText, callback) {

    let textMessage = new CometChat.TextMessage(opponent_uid, messageText, CometChat.RECEIVER_TYPE.USER);

    CometChat.sendMessage(textMessage).then(
        message => {
            console.log('Message sent successfully:', message);
            callback(true, message);
        },
        error => {
            console.log('Message sending failed with error:', error);
            callback(false, error);
        }
    );
}

function sendTextMessageToGroup(receiverID, messageText, callback) {

    let textMessage = new CometChat.TextMessage(receiverID, messageText, CometChat.RECEIVER_TYPE.GROUP);

    CometChat.sendMessage(textMessage).then(
        message => {
            callback(true, message);
        },
        error => {
            callback(false, error);
        }
    );
}

function sendMediaMessageToUser(opponent_uid, messageMedia, callback) {

    let mediaMessage = new CometChat.MediaMessage(opponent_uid, messageMedia, CometChat.MESSAGE_TYPE.FILE, CometChat.RECEIVER_TYPE.USER);

    CometChat.sendMediaMessage(mediaMessage).then(
        message => {
            console.log('Media message sent successfully', message);
            callback(true, message);
        },
        error => {
            console.log('Media message sending failed with error', error);
            callback(false, error);
        }
    );
}

function sendMediaMessageToGroup(receiverID, messageMedia, callback) {

    let mediaMessage = new CometChat.MediaMessage(receiverID, messageMedia, CometChat.MESSAGE_TYPE.FILE, CometChat.RECEIVER_TYPE.GROUP);

    CometChat.sendMediaMessage(mediaMessage).then(
        message => {
            callback(true, message);
        },
        error => {
            callback(false, error);
        }
    );
}


/**   ==========   Call   ==========   */

function initiateCallWithUser(receiverID, type) {

    let call;

    if (type === 'audio') {
        call = new CometChat.Call(receiverID, CometChat.CALL_TYPE.AUDIO, CometChat.RECEIVER_TYPE.USER);
    } else {
        call = new CometChat.Call(receiverID, CometChat.CALL_TYPE.VIDEO, CometChat.RECEIVER_TYPE.USER);
    }

    CometChat.initiateCall(call).then(
        outGoingCall => {
            console.log('Call initiated successfully:', outGoingCall);
            // perform action on success. Like show your calling screen.
        },
        error => {
            console.log('Call initialization failed with exception:', error);
        }
    );

}

function initiateCallWithGroup(receiverID, type) {

    let call;

    if (type === 'audio') {
        call = new CometChat.Call(receiverID, CometChat.CALL_TYPE.AUDIO, CometChat.RECEIVER_TYPE.GROUP);
    } else {
        call = new CometChat.Call(receiverID, CometChat.CALL_TYPE.VIDEO, CometChat.RECEIVER_TYPE.GROUP);
    }

    CometChat.initiateCall(call).then(
        outGoingCall => {
            console.log('Call initiated successfully:', outGoingCall);
            // perform action on success. Like show your calling screen.
        },
        error => {
            console.log('Call initialization failed with exception:', error);
        }
    );
}

function acceptCall(sessionID, callback) {

    CometChat.acceptCall(sessionID).then(
        call => {
            console.log('Call accepted successfully:', call);
            callback(true, sessionID)
        },
        error => {
            console.log('Call acceptance failed with error', error);
            callback(false, error)
        }
    );
}

function startCall(sessionID) {

    CometChat.startCall(
        sessionID,
        document.getElementById('callScreen'),
        new CometChat.OngoingCallListener({
            onUserJoined: user => {
                /* Notification received here if another user joins the call. */
                console.log('User joined call:', user);
                /* this method can be use to display message or perform any actions if someone joining the call */
                $('#callScreen').css('display', 'block');
            },
            onUserLeft: user => {
                /* Notification received here if another user left the call. */
                console.log('User left call:', user);
                /* this method can be use to display message or perform any actions if someone leaving the call */
                $('#callScreen').css('display', 'none');
            },
            onCallEnded: call => {
                /* Notification received here if current ongoing call is ended. */
                console.log('Call ended:', call);
                /* hiding/closing the call screen can be done here. */
                $('#callScreen').css('display', 'none');
            }
        })
    );
}

function rejectCall(sessionID) {

    CometChat.rejectCall(sessionID, CometChat.CALL_STATUS.REJECTED).then(
        call => {
            console.log('Call rejected successfully', call);
        },
        error => {
            console.log('Call rejection failed with error:', error);
        }
    );

}


/**   ==========   All Real-Time Listeners   ==========   */

function UserListener(listenerID, element, callback) {
    CometChat.addUserListener(
        listenerID,
        new CometChat.UserListener({
            onUserOnline: onlineUser => {
                console.log('On User Online:', {onlineUser});
                callback(true, element)
            },
            onUserOffline: offlineUser => {
                console.log('On User Offline:', {offlineUser});
                callback(false, element)
            }
        })
    );
}

function GroupListener(listenerID) {

    CometChat.addGroupListener(
        listenerID,
        new CometChat.GroupListener({
            onGroupMemberJoined: (message, joinedUser, joinedGroup) => {
                console.log('User joined', {message, joinedUser, joinedGroup});
                // Handle Event : bannedUser banned from group by bannedBy
            },
            onGroupMemberLeft: (message, leftUser, leftGroup) => {
                console.log('User joined', {message, leftUser, leftGroup});
                // Handle Event : bannedUser banned from group by bannedBy
            },
            onGroupMemberKicked: (message, kickedUser, kickedBy, kickedFrom) => {
                console.log('User joined', {message, kickedUser, kickedBy, kickedFrom});
                // Handle Event : bannedUser banned from group by bannedBy
            },
            onGroupMemberBanned: (message, bannedUser, bannedBy, bannedFrom) => {
                console.log('User joined', {message, bannedUser, bannedBy, bannedFrom});
                // Handle Event : bannedUser banned from group by bannedBy
            },
            onGroupMemberUnBanned: (
                message,
                unbannedUser,
                unbannedBy,
                unbannedFrom
            ) => {
                console.log('User joined', {
                    message,
                    unbannedUser,
                    unbannedBy,
                    unbannedFrom
                });
                // Handle Event : bannedUser banned from group by bannedBy
            },
            onGroupMemberScopeChanged: (
                message,
                updatedBy,
                updatedUser,
                scopeChangedTo,
                scopeChangedFrom,
                group
            ) => {
                console.log('User joined', {
                    message,
                    updatedBy,
                    updatedUser,
                    scopeChangedTo,
                    scopeChangedFrom,
                    group
                });
                // Handle Event : bannedUser banned from group by bannedBy
            },
            onMemberAddedToGroup: (message, addedby, userAdded, addedTo) => {
                console.log('User joined', {message, addedby, userAdded, addedTo});
                // Handle Event : bannedUser banned from group by bannedBy
            }
        })
    );
}

function MessageListener(listenerID) {

    CometChat.addMessageListener(
        listenerID,
        new CometChat.MessageListener({
            onTextMessageReceived: textMessage => {
                console.log('Text message received successfully', textMessage);
            },
            onMediaMessageReceived: mediaMessage => {
                console.log('Media message received successfully', mediaMessage);
            },
            onCustomMessageReceived: customMessage => {
                console.log('Custom message received successfully', customMessage);
            },
            onMessagesDelivered: messageReceipt => {
                console.log('Message Delivered', messageReceipt);
            },
            onMessagesRead: messageReceipt => {
                console.log('Message Read', messageReceipt);
            },
            onTypingStarted: typingIndicator => {
                console.log('Typing Started', typingIndicator);
            },
            onTypingEnded: typingIndicator => {
                console.log('Typing Ended', typingIndicator);
            },
            onMessagesDeleted: message => {
                console.log('Message Delted', message);
            },
            onMessagesEdited: message => {
                console.log('Message Edited', message);
            }
        })
    );
}

function CallListener(listenerID) {

    CometChat.addCallListener(
        listenerID,
        new CometChat.CallListener({
            onIncomingCallReceived(call) {
                console.log('Incoming call:', call);
            },
            onOutgoingCallAccepted(call) {
                console.log('Outgoing call accepted:', call);
            },
            onOutgoingCallRejected(call) {
                console.log('Outgoing call rejected:', call);
            },
            onIncomingCallCancelled(call) {
                console.log('Incoming call calcelled:', call);
            }
        })
    );
}

/**   ==========  Remove Listener   ==========   */

function removeMessageListener(listenerID) {
    CometChat.removeMessageListener(listenerID);
}

function removeCallListener(listenerID) {
    CometChat.removeCallListener(listenerID);
}

function removeUserListener(listenerID) {
    CometChat.removeUserListener(listenerID)
}

function removeGroupListener(listenerID) {
    CometChat.removeGroupListener(listenerID)
}