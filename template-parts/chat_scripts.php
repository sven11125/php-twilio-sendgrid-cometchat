<script src="slicing/js/cometchat.min.js"></script>
<script src="slicing/js/chatApis.js"></script>
<script src="slicing/js/firebase.js"></script>

<script>

    let self_uid = '<?php echo $_SESSION['SiteUser']['cometchat_uid']; ?>';
    let self_role = '<?php echo $_SESSION['SiteUser']['role']; ?>';

    console.log('self_uid ---------->', self_uid);
    console.log('self_role ---------->', self_role);

    let unreadMessagesAllCount = 0;
    let chatBoxState = '';
    let bigChatSelectedUid;
    let userSearchRequest = null;


    $(document).ready(function () {
        initCometchat(initCallback);
    });


    function initCallback(status) {
        if (status) {
            userLogin(self_uid, loginCallback)
        }
    }


    function loginCallback(status) {
        if (status) {
            getUnreadMessageCountForAllUsers(unreadMessagesCountForAllUsersCallback);
            userList('all', userListCallback);

            CometChat.addMessageListener(
                self_uid,
                new CometChat.MessageListener({
                    onTextMessageReceived: textMessage => {

                        console.log("Text message received successfully", textMessage);

                        if (textMessage.type === 'text') {
                            if (chatBoxState === '') {

                            } else if (chatBoxState === 'SmallChat') {

                                $('#' + textMessage.sender.uid + ' .inner-content').append('<div class="message-item">\n' +
                                    '                                                         <div class="chat-thumb">\n' +
                                    '                                                           <figure class="is-32x32">\n' +
                                    '                                                             <img src="slicing/img/photo.png" alt="">\n' +
                                    '                                                           </figure>\n' +
                                    '                                                         </div>\n' +
                                    '                                                         <div class="chat-message">\n' +
                                    '                                                           <div class="message">' + textMessage.text + '<input class="trick-input" type="text"></div>\n' +
                                    '                                                         </div>\n' +
                                    '                                                       </div>');

                                $('.inner-content').each(function () {
                                    $(this).children().find('.chat-message:last-child input').focus();
                                });

                            } else if (chatBoxState === 'BigChat') {
                                if (bigChatSelectedUid === textMessage.sender.uid) {

                                    $('.big-chat-message-inner-content').append('<div class="big-chat-message-item">' + textMessage.data.text + '<input class="trick-input" type="text"></div>');

                                    $('.big-chat-message-inner-content').each(function () {
                                        $(this).find('.big-chat-message-item:last-child input').focus();
                                    });
                                }
                            }

                            CometChat.markAsRead(textMessage.id, textMessage.sender.uid, CometChat.RECEIVER_TYPE.USER);

                        } else if (textMessage.type === 'audio' || textMessage.type === 'video') {
                        }
                    },
                    onMediaMessageReceived: mediaMessage => {

                        console.log('Media message received successfully', mediaMessage);

                        if (chatBoxState === '') {

                        } else if (chatBoxState === 'SmallChat') {

                            $('#' + mediaMessage.sender.uid + ' .inner-content').append('<div class="message-item">\n' +
                                '                                                         <div class="chat-thumb">\n' +
                                '                                                           <figure class="is-32x32">\n' +
                                '                                                             <img src="slicing/img/photo.png" alt="">\n' +
                                '                                                           </figure>\n' +
                                '                                                         </div>\n' +
                                '                                                         <div class="chat-message">\n' +
                                '                                                           <div class="message"><img src="' + mediaMessage.data.url + '"><input class="trick-input" type="text"></div>\n' +
                                '                                                         </div>\n' +
                                '                                                        </div>');

                            $('.inner-content').each(function () {
                                $(this).children().find('.chat-message:last-child input').focus();

                            });
                        } else if (chatBoxState === 'BigChat') {
                            if (bigChatSelectedUid === mediaMessage.sender.uid) {

                                $('.big-chat-message-inner-content').append('<div class="big-chat-message-item"><img src="' + mediaMessage.data.url + '"><input class="trick-input" type="text"></div>');

                                $('.big-chat-message-inner-content').children().find('.chat-message:last-child input').focus();
                            }
                        }

                        CometChat.markAsRead(mediaMessage.id, mediaMessage.sender.uid, CometChat.RECEIVER_TYPE.USER);
                    },
                    onCustomMessageReceived: customMessage => {
                        console.log('Custom message received successfully', customMessage);
                    }
                })
            );

            CometChat.addCallListener(
                self_uid,
                new CometChat.CallListener({
                    onIncomingCallReceived(call) {
                        console.log("Incoming call:", call);
                        acceptCall(call.sessionId, acceptCallback)
                    },
                    onOutgoingCallAccepted(call) {
                        console.log("Outgoing call accepted:", call);
                        startCall(call.sessionId)
                    },
                    onOutgoingCallRejected(call) {
                        console.log("Outgoing call rejected:", call);
                        rejectCall(call.sessionId)
                    },
                    onIncomingCallCancelled(call) {
                        console.log("Incoming call cancelled:", call);
                        rejectCall(call.sessionId)
                    }
                })
            );
        } else {
            console.error('Cometchat Login Failure.')
        }
    }


    function unreadMessagesCountForAllUsersCallback(status, unreadMessagesCount) {
        if (status) {
            if (self_role === 'superadmin') {

            } else {
                for (let key in unreadMessagesCount) {
                    unreadMessagesAllCount += unreadMessagesCount[key];
                    $('.contacts__item').each(function () {
                        if ($(this).find('.uid').text() === key) {
                            $(this).find('.contact').append('<span class="contact__notification">' + unreadMessagesCount[key] + '</span>')
                        }
                    })
                }
                $('.user-nav').last().append('<span class="user-nav__notification">' + unreadMessagesAllCount + '</span>')
            }
        }
    }


    function userListCallback(status, users) {
        if (status) {
            if (self_role === 'superadmin') {

            } else {
                $('.contacts__item').each(function () {
                    for (let user of users) {
                        if ($(this).find('.uid').text() === user.uid) {

                            UserListener($(this).find('.uid').text(), this, userListenerCallback);

                            if (user.status === 'online') {
                                $(this).append('<span class="contact__status contact__status--green"></span>')
                            } else {
                                $(this).append('<span class="contact__status contact__status--yellow"></span>')
                            }
                        }
                    }
                })
            }
        }
    }


    function userListenerCallback(status, element) {
        if (status) {
            $(element).find('.contact__status').remove();
            $(element).append('<span class="contact__status contact__status--green"></span>')
        } else {
            $(element).find('.contact__status').remove();
            $(element).append('<span class="contact__status contact__status--yellow"></span>')
        }
    }


    function acceptCallback(status, sessionID) {
        if (status) {
            startCall(sessionID)
        }
    }


    $(document).on('click', '.contacts__item', function () {

        chatBoxState = 'SmallChat';

        let opponent_name = $(this).find('.contact__name').text();
        let opponent_uid = $(this).find('.uid').text();
        let opponent_role = $(this).find('.role').text();

        let opened_uids = [];
        let chatBoxCount = 0;

        $('.chat-box-container .one-chat-box .card').each(function () {
            opened_uids.push($(this).children('header').children().find('.uid').text());
            chatBoxCount++;
        });

        if (chatBoxCount < 3 && !opened_uids.includes(opponent_uid)) {
            let right = $('.contacts').width() + 32 + chatBoxCount * 316;
            let rightStyle = 'right: ' + right + 'px';
            $('.chat-box-container').append('<div class="one-chat-box" id="' + opponent_uid + '" style="' + rightStyle + '">\n' +
                '                             <div class="chatBox" id="chatBox">\n' +
                '                               <div class="card">\n' +
                '                                 <header class="card-header">\n' +
                '                                   <p class="card-header-title">\n' +
                '                                     <i class="fa fa-circle is-online"></i>\n' +
                '                                     <img src="slicing/img/photo.png" alt="">\n' +
                '                                     <span>' + opponent_name + '</span>\n' +
                '                                     <span class="card-header-icons">\n' +
                '                                       <i class="fa fa-video-camera" aria-hidden="true"></i>\n' +
                '                                       <i class="fa fa-phone mr-2" aria-hidden="true"></i>\n' +
                '                                       <i class="fa fa-times-circle" aria-hidden="true"></i>\n' +
                '                                       <span class="uid" hidden>' + opponent_uid + '</span>\n' +
                '                                     </span>\n' +
                '                                   </p>\n' +
                '                                  </header>\n' +
                '                                  <div id="chatBox-area">\n' +
                '                                   <div class="card-content chat-content">\n' +
                '                                     <div class="inner-content">\n' +
                // '                                    <div class="message-item">\n' +
                // '                                      <div class="spinner">\n' +
                // '                                        <div class="bounce1"></div>\n' +
                // '                                        <div class="bounce2"></div>\n' +
                // '                                        <div class="bounce3"></div>\n' +
                // '                                      </div>\n' +
                // '                                    </div>\n' +
                '                                     </div>\n' +
                '                                    </div>\n' +
                '                                    <footer class="card-footer" id="chatBox-textBox">\n' +
                '                                      <div class="message-box">\n' +
                '                                        <textarea type="text" placeholder="Type a message..."></textarea>\n' +
                '                                        <span class="uid" hidden>' + opponent_uid + '</span>' +
                '                                        <div class="tools">\n' +
                '                                          <i class="fa fa-paperclip" aria-hidden="true"></i>\n' +
                '                                          <input type="file" name="img_file" id="img_file" hidden/>\n' +
                '                                        </div>\n' +
                '                                      </div>\n' +
                '                                    </footer>\n' +
                '                                   </div>\n' +
                '                                  </div>\n' +
                '                                 </div>\n' +
                '                                </div>');

            getMessageHistoryOfParticularUser(opponent_uid, messageHistoryOfUserCallback);
        }
    });


    function messageHistoryOfUserCallback(status, opponent_uid, messages) {
        if (status) {

            messages.forEach((message) => {
                if (message.receiverId === self_uid && message.sender.uid === opponent_uid) {

                    if (message.type === 'text') {
                        $('#' + opponent_uid + ' .inner-content').append('<div class="message-item">\n' +
                            '                                               <div class="chat-thumb">\n' +
                            '                                                 <figure class="is-32x32">\n' +
                            '                                                   <img src="slicing/img/photo.png" alt="">\n' +
                            '                                                 </figure>\n' +
                            '                                               </div>\n' +
                            '                                               <div class="chat-message">\n' +
                            '                                                 <div class="message">' + message.data.text + '<input class="trick-input" type="text"></div>\n' +
                            '                                               </div>\n' +
                            '                                              </div>');
                    } else if (message.type === 'file') {
                        $('#' + opponent_uid + ' .inner-content').append('<div class="message-item">\n' +
                            '                                                     <div class="chat-thumb">\n' +
                            '                                                       <figure class="is-32x32">\n' +
                            '                                                         <img src="slicing/img/photo.png" alt="">\n' +
                            '                                                       </figure>\n' +
                            '                                                     </div>\n' +
                            '                                                     <div class="chat-message">\n' +
                            '                                                       <div class="message"><img src="' + message.data.url + '"><input class="trick-input" type="text"></div>\n' +
                            '                                                     </div>\n' +
                            '                                                   </div>');
                    } else if (message.type === 'audio' || message.type === 'video') {
                        $('#' + opponent_uid + ' .inner-content').append('<div class="message-item">\n' +
                            '                                               <div class="chat-thumb">\n' +
                            '                                                 <figure class="is-32x32">\n' +
                            '                                                   <img src="slicing/img/photo.png" alt="">\n' +
                            '                                                 </figure>\n' +
                            '                                               </div>\n' +
                            '                                               <div class="chat-message">\n' +
                            '                                                 <div class="message">Call<input class="trick-input" type="text"></div>\n' +
                            '                                               </div>\n' +
                            '                                             </div>')
                    }

                } else if (message.receiverId === opponent_uid && message.sender.uid === self_uid) {

                    if (message.type === 'text') {
                        $('#' + opponent_uid + ' .inner-content').append('<div class="message-item writer-user">\n' +
                            '                                               <div class="chat-message">\n' +
                            '                                                 <div class="message">' + message.data.text + '<input class="trick-input" type="text"></div>\n' +
                            '                                               </div>\n' +
                            '                                             </div>')
                    } else if (message.type === 'file') {
                        $('#' + opponent_uid + ' .inner-content').append('<div class="message-item writer-user">\n' +
                            '                                                     <div class="chat-message">\n' +
                            '                                                       <div class="message"><img src="' + message.data.url + '"><input class="trick-input" type="text"></div>\n' +
                            '                                                     </div>\n' +
                            '                                                   </div>');
                    } else if (message.type === 'audio' || message.type === 'video') {
                        $('#' + opponent_uid + ' .inner-content').append('<div class="message-item writer-user">\n' +
                            '                                               <div class="chat-message">\n' +
                            '                                                 <div class="message">Call<input class="trick-input" type="text"></div>\n' +
                            '                                               </div>\n' +
                            '                                             </div>')
                    }
                }
            });

            getUnreadMessagesForUser(opponent_uid, unreadMessagesOfUserCallback)
        }
    }


    function unreadMessagesOfUserCallback(status, opponent_uid, unreadMessages) {
        if (status) {

            $('.user-nav').last().children().find('user-nav__notification').remove();
            unreadMessagesAllCount -= unreadMessages.length;
            $('.user-nav').last().append('<span class="user-nav__notification">' + unreadMessagesAllCount + '</span>');

            unreadMessages.forEach((message) => {
                if (message.type === 'text') {
                    $('#' + message.sender.uid + ' .inner-content').append('<div class="message-item">\n' +
                        '                                                     <div class="chat-thumb">\n' +
                        '                                                       <figure class="is-32x32">\n' +
                        '                                                         <img src="slicing/img/photo.png" alt="">\n' +
                        '                                                       </figure>\n' +
                        '                                                     </div>\n' +
                        '                                                     <div class="chat-message">\n' +
                        '                                                       <div class="message">' + message.data.text + '<input class="trick-input" type="text"></div>\n' +
                        '                                                     </div>\n' +
                        '                                                   </div>');
                } else if (message.type === 'file') {
                    $('#' + message.sender.uid + ' .inner-content').append('<div class="message-item">\n' +
                        '                                                     <div class="chat-thumb">\n' +
                        '                                                       <figure class="is-32x32">\n' +
                        '                                                         <img src="slicing/img/photo.png" alt="">\n' +
                        '                                                       </figure>\n' +
                        '                                                     </div>\n' +
                        '                                                     <div class="chat-message">\n' +
                        '                                                       <div class="message"><img src="' + message.data.url + '"><input class="trick-input" type="text"></div>\n' +
                        '                                                     </div>\n' +
                        '                                                   </div>');
                } else if (message.type === 'audio' || message.type === 'video') {
                    $('#' + message.sender.uid + ' .inner-content').append('<div class="message-item">\n' +
                        '                                                     <div class="chat-thumb">\n' +
                        '                                                       <figure class="is-32x32">\n' +
                        '                                                         <img src="slicing/img/photo.png" alt="">\n' +
                        '                                                       </figure>\n' +
                        '                                                     </div>\n' +
                        '                                                     <div class="chat-message">\n' +
                        '                                                       <div class="message">Missed Call<input class="trick-input" type="text"></div>\n' +
                        '                                                     </div>\n' +
                        '                                                   </div>');
                }

                CometChat.markAsRead(message.id, message.sender.uid, CometChat.RECEIVER_TYPE.USER);
            });

            $('.inner-content').each(function () {
                $(this).children().find('.chat-message:last-child input').focus();
            });

            $('.contacts__item').each(function () {
                if ($(this).find('.uid').text() === opponent_uid) {
                    $(this).children().find('.contact__notification').remove()
                }
            });

            getMissedMessages(opponent_uid)
        }
    }


    $(document).on('keypress', '.one-chat-box .message-box textarea', function (e) {

        let opponent_uid = $(this).parent().find('.uid').text();

        if (e.which === 13) {
            let message = $(this).val();
            $(this).focus().val('');
            e.preventDefault();

            sendTextMessageToUser(opponent_uid, message, sendTextMessageToUserCallback);
        }
    });


    function sendTextMessageToUserCallback(status, message) {
        if (status) {
            $('#' + message.receiverId + ' .inner-content').append('<div class="message-item writer-user">\n' +
                '                                                     <div class="chat-message">\n' +
                '                                                       <div class="message">' + message.text + '<input class="trick-input" type="text"></div>\n' +
                '                                                     </div>\n' +
                '                                                   </div>');

            $('.inner-content').each(function () {
                $(this).children().find('.chat-message:last-child input').focus();
            });
        }
    }


    $(document).on('click', '.one-chat-box .message-box .fa-paperclip', function (e) {

        let opponent_uid = $(this).parent().parent().find('.uid').text();

        $('#img_file').trigger('click');
        let onceChanged = 0;

        $('#img_file').change(function () {

            onceChanged++;

            if (onceChanged === 1) {
                let file = document.getElementById('img_file').files[0];
                let filename = $('#img_file').val().split('\\').pop();

                sendMediaMessageToUser(opponent_uid, file, sendMediaMessageToUserCallback);
            }
        });
    });


    function sendMediaMessageToUserCallback(status, message) {
        if (status) {
            $('#' + message.receiverId + ' .inner-content').append('<div class="message-item writer-user">\n' +
                '                                                     <div class="chat-message">\n' +
                '                                                       <div class="message"><img src="' + message.data.url + '"><input class="trick-input" type="text"></div>\n' +
                '                                                     </div>\n' +
                '                                                   </div>');

            $('.inner-content').each(function () {
                $(this).children().find('.chat-message:last-child input').focus();
            });
        }
    }


    $(document).on('click', '.one-chat-box .card-header', function () {
        if ($(this).parent().children('#chatBox-area').css('display') === 'none') {
            $(this).parent().children('#chatBox-area').css({'display': 'block'});
        } else {
            $(this).parent().children('#chatBox-area').css({'display': 'none'});
        }
    });


    $(document).on('click', '.one-chat-box .fa-phone', function () {
        let opponent_uid = $(this).parent().find('.uid').text();
        initiateCallWithUser(opponent_uid, 'audio')
    });


    $(document).on('click', '.one-chat-box .fa-video-camera', function () {
        let opponent_uid = $(this).parent().find('.uid').text();
        initiateCallWithUser(opponent_uid, 'video')
    });


    $(document).on('click', '.one-chat-box .fa-times-circle', function () {
        let opponent_uid = $(this).parent().find('.uid').text();
        $('#' + opponent_uid + '').remove();
    });


    $(document).on('click', '.user-nav .fa-envelope', function () {
        chatBoxState = 'BigChat';
        $('#bigChatBox').css('visibility', 'visible');
    });


    $(document).on('keyup', '.big-chat-user-top-search input', function (e) {

        let keyword = $(this).val();

        if (userSearchRequest === null) {
            userSearchRequest = setTimeout(function () {
                if (keyword.length > 2) {
                    $.ajax({
                        url: 'user_search.php',
                        type: 'POST',
                        dataType: 'text',
                        data: {keyword: keyword, self: self_uid},
                    })
                        .done(function (response) {
                            $('.big-chat-user-list').empty();
                            JSON.parse(response).forEach((user) => {
                                $('.big-chat-user-list').append('<div class="big-chat-user-item">\n' +
                                    '                             <img src="slicing/img/photo.png" alt="">\n' +
                                    '                             <div>\n' +
                                    '                               <h4>' + user.first_name + ' ' + user.last_name + '</h4>\n' +
                                    '                               <span class="uid" hidden>' + user.cometchat_uid + '</span>\n' +
                                    '                               <span class="role" hidden>' + user.role + '</span>\n' +
                                    '                               <span class="last-message">Hi, Pavel, How\'s your day today?</span>\n' +
                                    '                             </div>\n' +
                                    '                            </div>')
                            });
                        })
                        .fail(function () {
                            console.log("error");
                        })
                        .always(function () {
                        });
                } else if (keyword.length === 0) {
                    $.ajax({
                        url: 'user_search.php',
                        type: 'POST',
                        dataType: 'text',
                        data: {keyword: ' ', self: self_uid},
                    })
                        .done(function (response) {
                            $('.big-chat-user-list').empty();
                            console.log(response);
                            JSON.parse(response).forEach((user) => {
                                $('.big-chat-user-list').append('<div class="big-chat-user-item">\n' +
                                    '                              <img src="slicing/img/photo.png" alt="">\n' +
                                    '                              <div>\n' +
                                    '                               <h4>' + user.first_name + ' ' + user.last_name + '</h4>\n' +
                                    '                               <span class="uid" hidden>' + user.cometchat_uid + '</span>\n' +
                                    '                               <span class="role" hidden>' + user.role + '</span>\n' +
                                    '                               <span class="last-message">Hi, Pavel, How\'s your day today?</span>\n' +
                                    '                              </div>\n' +
                                    '                             </div>')
                            });
                        })
                        .fail(function () {
                            console.log("error");
                        })
                        .always(function () {
                        });
                }
            }, 1000);
        } else {
            clearTimeout(userSearchRequest);
            userSearchRequest = null
        }
    });


    $(document).on('click', '.big-chat-user-item', function () {

        $('.big-chat-user-item').each(function () {
            $(this).removeClass('focused');
        });
        $(this).addClass('focused');

        let opponent_uid = $(this).children().last().find('.uid').text();
        bigChatSelectedUid = opponent_uid;

        $('.big-chat-message-inner-content').empty();
        if (opponent_uid) {
            getMessageHistoryOfParticularUser(opponent_uid, messageHistoryOfUserCallback__BC);
        }
    });


    function messageHistoryOfUserCallback__BC(status, opponent_uid, messages) {
        if (status) {
            messages.forEach((message) => {

                if (message.receiverId === self_uid && message.sender.uid === opponent_uid) {
                    if (message.type === 'text') {
                        $('.big-chat-message-inner-content').append('<div class="big-chat-message-item">' + message.data.text + '<input class="trick-input" type="text"></div>')
                    } else if (message.type === 'file') {
                        $('.big-chat-message-inner-content').append(' <div class="big-chat-message-item"><img src="' + message.data.url + '"><input class="trick-input" type="text"></div>')
                    } else if (message.type === 'audio' || message.type === 'video') {
                        $('.big-chat-message-inner-content').append('<div class="big-chat-message-item">Call<input class="trick-input" type="text"></div>')
                    }

                } else if (message.receiverId === opponent_uid && message.sender.uid === self_uid) {
                    if (message.type === 'text') {
                        $('.big-chat-message-inner-content').append(' <div class="big-chat-message-item write-user">' + message.data.text + '<input class="trick-input" type="text"></div>')
                    } else if (message.type === 'file') {
                        $('.big-chat-message-inner-content').append(' <div class="big-chat-message-item write-user"><img src="' + message.data.url + '"><input class="trick-input" type="text"></div>')
                    } else if (message.type === 'audio' || message.type === 'video') {
                        $('.big-chat-message-inner-content').append(' <div class="big-chat-message-item write-user">Call<input class="trick-input" type="text"></div>')
                    }
                }
            });

            getUnreadMessagesForUser(opponent_uid, unreadMessagesOfUserCallback__BC)
        }
    }

    function unreadMessagesOfUserCallback__BC(status, opponent_uid, unreadMessages) {
        if (status) {

            $('.user-nav').last().children().find('user-nav__notification').remove();
            unreadMessagesAllCount -= unreadMessages.length;
            $('.user-nav').last().append('<span class="user-nav__notification">' + unreadMessagesAllCount + '</span>');

            unreadMessages.forEach((message) => {
                if (message.type === 'text') {
                    $('.big-chat-message-inner-content').append('<div class="big-chat-message-item">' + message.data.text + '<input class="trick-input" type="text"></div>')
                } else if (message.type === 'audio' || message.type === 'video') {
                    $('.big-chat-message-inner-content').append(' <div class="big-chat-message-item write-user">Missed Call<input class="trick-input" type="text"></div>')
                }
                CometChat.markAsRead(message.id, opponent_uid, CometChat.RECEIVER_TYPE.USER);
            });

            $('.big-chat-message-inner-content').each(function () {
                $(this).find('.big-chat-message-item:last-child input').focus();
            });

            if (self_role !== 'superadmin') {
                $('.contacts__item').each(function () {
                    if ($(this).find('.uid').text() === opponent_uid) {
                        $(this).children().find('.contact__notification').remove()
                    }
                });
            }
        }
    }


    $(document).on('click', '.big-chat-box-close-button', function () {
        chatBoxState = 'SmallChat';
        $('#bigChatBox').css('visibility', 'hidden');
    });


    $(document).on('click', '.big-chat-message-top-buttons .fa-phone', function () {
        if (bigChatSelectedUid) {
            initiateCallWithUser(bigChatSelectedUid, 'audio')
        }
    });


    $(document).on('click', '.big-chat-message-top-buttons .fa-video-camera', function () {
        if (bigChatSelectedUid) {
            initiateCallWithUser(bigChatSelectedUid, 'video')
        }
    });


    $(document).on('click', '.big-chat-message-top-buttons .fa-info-circle', function () {
        $('.big-chat-message-content').prepend('<div class="big-chat-message-search">\n' +
            '                                     <i class="fa fa-search" aria-hidden="true"></i>\n' +
            '                                     <input placeholder="Search The Messages">\n' +
            '                                     <i class="fa fa-times-circle-o" aria-hidden="true"></i>\n' +
            '                                   </div>')
    });


    $(document).on('click', '.big-chat-message-bottom-buttons .fa-paper-plane', function () {

        let message = $('.big-chat-message-bottom input').val();

        if (bigChatSelectedUid) {
            sendTextMessageToUser(bigChatSelectedUid, message, sendTextMessageToUserCallback__BC);
        }
    });


    function sendTextMessageToUserCallback__BC(status, message) {
        if (status) {
            $('.big-chat-message-inner-content').append(' <div class="big-chat-message-item write-user">' + message.text + '<input class="trick-input" type="text"></div>')
            $('.big-chat-message-bottom input').val('');

            $('.big-chat-message-inner-content').each(function () {
                $(this).find('.big-chat-message-item:last-child input').focus();
            });
        }
    }


    $(document).on('click', '.big-chat-message-bottom-buttons .fa-paperclip', function (e) {

        $('#img_file_bc').trigger('click');
        let onceChanged = 0;

        $('#img_file_bc').change(function () {
            onceChanged++;

            if (onceChanged === 1) {
                let file = document.getElementById('img_file_bc').files[0];
                let filename = $('#img_file_bc').val().split('\\').pop();
                sendMediaMessageToUser(bigChatSelectedUid, file, sendMediaMessageToUserCallback__BC);
            }
        });
    });


    function sendMediaMessageToUserCallback__BC(status, message) {
        if (status) {
            $('.big-chat-message-inner-content').append(' <div class="big-chat-message-item write-user"><img src="' + message.data.url + '"><input class="trick-input" type="text"></div>')

            $('.big-chat-message-inner-content').each(function () {
                $(this).find('.big-chat-message-item:last-child input').focus();
            });
        }
    }


    $(document).on('click', '.big-chat-message-search .fa-times-circle-o', function () {
        $('.big-chat-message-search').remove();
    });


    $(document).on('click', '.contacts-navigator .fa-chevron-circle-right', function () {
        $('.contacts-navigator .fa-chevron-circle-right').css('display', 'none');
        $('.contacts-navigator .fa-chevron-circle-left').css('display', 'block');
        $('.user-search').css('display', 'none');
        $('.contacts__item .contact__name').css('display', 'none');
        $('.contacts__item .contact__status').css('display', 'none');
        $('.contacts__title').css('display', 'none');
    });


    $(document).on('click', '.contacts-navigator .fa-chevron-circle-left', function () {
        $('.contacts-navigator .fa-chevron-circle-right').css('display', 'block');
        $('.contacts-navigator .fa-chevron-circle-left').css('display', 'none');
        $('.user-search').css('display', 'flex');
        $('.contacts__item .contact__name').css('display', 'block');
        $('.contacts__item .contact__status').css('display', 'block');
        $('.contacts__title').css('display', 'block');
    });


    /**   ==============================   super admin   ==============================   */

    $(document).on('click', '.dashboard__notification .fa-envelope', function () {
        chatBoxState = 'BigChat';
        $('#bigChatBox').css('visibility', 'visible');
    });


    $(document).on('click', '.select-action__item .quick_message', function () {

        chatBoxState = 'SmallChat';

        $('.select-action__dropdown').slideUp();

        let opponent_name = $(this).parent().find('.name').text();
        let opponent_uid = $(this).parent().find('.uid').text();
        let opponent_role = $(this).parent().find('.role').text();

        console.log('opponent_name ---------->', opponent_name);
        console.log('opponent_uid ---------->', opponent_uid);

        if (opponent_name) {
            opponent_name = 'undefined'
        }

        if (opponent_uid) {
            opponent_uid = 'undefined'
        }

        $.ajax({
            url: 'user_register.php',
            type: 'POST',
            dataType: 'text',
            data: {role: 'superadmin', sender: self_uid, receiver: opponent_uid},
        })
            .done(function (response) {
                console.log(response)
            })
            .fail(function () {
                console.log('error');
            })
            .always(function () {
            });

        setTimeout(() => {

            let opened_uids = [];
            let chatBoxCount = 0;

            $('.chat-box-container .one-chat-box .card').each(function () {
                opened_uids.push($(this).children('header').children().find('.uid').text());
                chatBoxCount++;
            });

            if (chatBoxCount < 3 && !opened_uids.includes(opponent_uid)) {
                let right = 16 + chatBoxCount * 316;
                let rightStyle = 'right: ' + right + 'px';
                $('.chat-box-container').append('<div class="one-chat-box" id="' + opponent_uid + '" style="' + rightStyle + '">\n' +
                    '                             <div class="chatBox">\n' +
                    '                               <div class="card">\n' +
                    '                                 <header class="card-header">\n' +
                    '                                   <p class="card-header-title">\n' +
                    '                                     <i class="fa fa-circle is-online"></i>\n' +
                    '                                     <img src="slicing/img/photo.png" alt="">\n' +
                    '                                     <span>' + opponent_name + '</span>\n' +
                    '                                     <span class="card-header-icons">\n' +
                    '                                       <i class="fa fa-video-camera" aria-hidden="true"></i>\n' +
                    '                                       <i class="fa fa-phone mr-2" aria-hidden="true"></i>\n' +
                    '                                       <i class="fa fa-times-circle" aria-hidden="true"></i>\n' +
                    '                                       <span class="uid" hidden>' + opponent_uid + '</span>\n' +
                    '                                     </span>\n' +
                    '                                   </p>\n' +
                    '                                  </header>\n' +
                    '                                  <div id="chatBox-area">\n' +
                    '                                   <div class="card-content chat-content">\n' +
                    '                                     <div class="inner-content">\n' +
                    // '                                    <div class="message-item">\n' +
                    // '                                      <div class="spinner">\n' +
                    // '                                        <div class="bounce1"></div>\n' +
                    // '                                        <div class="bounce2"></div>\n' +
                    // '                                        <div class="bounce3"></div>\n' +
                    // '                                      </div>\n' +
                    // '                                    </div>\n' +
                    '                                     </div>\n' +
                    '                                    </div>\n' +
                    '                                    <footer class="card-footer" id="chatBox-textBox">\n' +
                    '                                      <div class="message-box">\n' +
                    '                                        <textarea type="text" placeholder="Type a message..."></textarea>\n' +
                    '                                        <span class="uid" hidden>' + opponent_uid + '</span>' +
                    '                                        <div class="tools">\n' +
                    '                                          <i class="fa fa-paperclip" aria-hidden="true"></i>\n' +
                    '                                          <input type="file" name="img_file" id="img_file" hidden/>\n' +
                    '                                        </div>\n' +
                    '                                      </div>\n' +
                    '                                    </footer>\n' +
                    '                                   </div>\n' +
                    '                                  </div>\n' +
                    '                                 </div>\n' +
                    '                                </div>');

                getMessageHistoryOfParticularUser(opponent_uid, messageHistoryOfUserCallback_SuperAdmin);
            }
        }, 1000)
    });


    function messageHistoryOfUserCallback_SuperAdmin(status, opponent_uid, messages) {
        if (status) {

            messages.forEach((message) => {
                if (message.receiverId === self_uid && message.sender.uid === opponent_uid) {

                    if (message.type === 'text') {
                        $('#' + opponent_uid + ' .inner-content').append('<div class="message-item">\n' +
                            '                                               <div class="chat-thumb">\n' +
                            '                                                 <figure class="is-32x32">\n' +
                            '                                                   <img src="slicing/img/photo.png" alt="">\n' +
                            '                                                 </figure>\n' +
                            '                                               </div>\n' +
                            '                                               <div class="chat-message">\n' +
                            '                                                 <div class="message">' + message.data.text + '<input class="trick-input" type="text"></div>\n' +
                            '                                               </div>\n' +
                            '                                             </div>')
                    } else if (message.type === 'file') {
                        $('#' + opponent_uid + ' .inner-content').append('<div class="message-item">\n' +
                            '                                               <div class="chat-thumb">\n' +
                            '                                                 <figure class="is-32x32">\n' +
                            '                                                   <img src="slicing/img/photo.png" alt="">\n' +
                            '                                                 </figure>\n' +
                            '                                               </div>\n' +
                            '                                               <div class="chat-message">\n' +
                            '                                                 <div class="message"><img src="' + message.data.url + '"><input class="trick-input" type="text"></div>\n' +
                            '                                               </div>\n' +
                            '                                              </div>');
                    } else if (message.type === 'audio' || message.type === 'video') {
                        $('#' + opponent_uid + ' .inner-content').append('<div class="message-item">\n' +
                            '                                               <div class="chat-thumb">\n' +
                            '                                                 <figure class="is-32x32">\n' +
                            '                                                   <img src="slicing/img/photo.png" alt="">\n' +
                            '                                                 </figure>\n' +
                            '                                               </div>\n' +
                            '                                               <div class="chat-message">\n' +
                            '                                                 <div class="message">Call<input class="trick-input" type="text"></div>\n' +
                            '                                               </div>\n' +
                            '                                             </div>')
                    }

                } else if (message.receiverId === opponent_uid && message.sender.uid === self_uid) {

                    if (message.type === 'text') {
                        $('#' + opponent_uid + ' .inner-content').append('<div class="message-item writer-user">\n' +
                            '                                               <div class="chat-message">\n' +
                            '                                                 <div class="message">' + message.data.text + '<input class="trick-input" type="text"></div>\n' +
                            '                                               </div>\n' +
                            '                                             </div>')
                    } else if (message.type === 'file') {
                        $('#' + opponent_uid + ' .inner-content').append('<div class="message-item writer-user">\n' +
                            '                                               <div class="chat-message">\n' +
                            '                                                 <div class="message"><img src="' + message.data.url + '"><input class="trick-input" type="text"></div>\n' +
                            '                                               </div>\n' +
                            '                                             </div>');
                    } else if (message.type === 'audio' || message.type === 'video') {
                        $('#' + opponent_uid + ' .inner-content').append('<div class="message-item writer-user">\n' +
                            '                                               <div class="chat-message">\n' +
                            '                                                 <div class="message">Call<input class="trick-input" type="text"></div>\n' +
                            '                                               </div>\n' +
                            '                                             </div>')
                    }
                }
            });

            getUnreadMessagesForUser(opponent_uid, unreadMessagesOfUserCallback_SuperAdmin)
        }
    }


    function unreadMessagesOfUserCallback_SuperAdmin(status, opponent_uid, unreadMessages) {
        if (status) {

            unreadMessages.forEach((message) => {
                if (message.type === 'text') {
                    $('#' + opponent_uid + ' .inner-content').append('<div class="message-item">\n' +
                        '                                               <div class="chat-thumb">\n' +
                        '                                                 <figure class="is-32x32">\n' +
                        '                                                   <img src="slicing/img/photo.png" alt="">\n' +
                        '                                                 </figure>\n' +
                        '                                               </div>\n' +
                        '                                               <div class="chat-message">\n' +
                        '                                                 <div class="message">' + message.data.text + '<input class="trick-input" type="text"></div>\n' +
                        '                                               </div>\n' +
                        '                                             </div>');
                } else if (message.type === 'file') {
                    $('#' + opponent_uid + ' .inner-content').append('<div class="message-item">\n' +
                        '                                                     <div class="chat-thumb">\n' +
                        '                                                       <figure class="is-32x32">\n' +
                        '                                                         <img src="slicing/img/photo.png" alt="">\n' +
                        '                                                       </figure>\n' +
                        '                                                     </div>\n' +
                        '                                                     <div class="chat-message">\n' +
                        '                                                       <div class="message"><img src="' + message.data.url + '"><input class="trick-input" type="text"></div>\n' +
                        '                                                     </div>\n' +
                        '                                                   </div>');
                } else if (message.type === 'audio' || message.type === 'video') {
                    $('#' + opponent_uid + ' .inner-content').append('<div class="message-item">\n' +
                        '                                               <div class="chat-thumb">\n' +
                        '                                                 <figure class="is-32x32">\n' +
                        '                                                   <img src="slicing/img/photo.png" alt="">\n' +
                        '                                                 </figure>\n' +
                        '                                               </div>\n' +
                        '                                               <div class="chat-message">\n' +
                        '                                                 <div class="message">Missed Call<input class="trick-input" type="text"></div>\n' +
                        '                                               </div>\n' +
                        '                                             </div>');
                }

                CometChat.markAsRead(message.id, opponent_uid, CometChat.RECEIVER_TYPE.USER);
            });

            $('.inner-content').each(function () {
                $(this).children().find('.chat-message:last-child input').focus();
            });
        }
    }


    /**   ==============================   talent job   ==============================   */

    $(document).on('click', '.vacancy__top .fa-heart', function (e) {

        let job_id = $(this).attr('data-job_id');

        $.ajax({
            url: 'user_register.php',
            type: 'POST',
            dataType: 'text',
            data: {role: 'talent', self: self_uid, job_id: job_id},
        })
            .done(function (response) {
                console.log(response)
            })
            .fail(function () {
                console.log('error');
            })
            .always(function () {
            });

    });


    /**
     let data = {
                receiver: '10000001',
                receiverType: 'user',
                category: 'message',
                type: 'text',
                data: {text: message}
            };

     let xhr = new XMLHttpRequest();

     xhr.addEventListener('readystatechange', function () {
                if (this.readyState === this.DONE) {
                    $('.inner-content').append('<div class="message-item writer-user">\n' +
                        '                         <div class="chat-message">\n' +
                        '                           <div class="message">' + message.text + '<input class="trick-input" type="text"></div>\n' +
                        '                         </div>\n' +
                        '                       </div>')
                }
            });

     xhr.open('POST', 'https://api-eu.cometchat.io/v2.0/users/10000002/messages');
     xhr.setRequestHeader('appid', '1430499b11ee649');
     xhr.setRequestHeader('apikey', '029c53a23201a8e01a15e1ff3e2fa86f6ab48006');
     xhr.setRequestHeader('content-type', 'application/json');
     xhr.setRequestHeader('accept', 'application/json');

     xhr.send(JSON.stringify(data));
     */

</script>