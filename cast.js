/*global chrome*/
/*jslint devel: true, browser: true */
var castBtn;
var session, currentMedia;

function receiverListener() {
    'use strict';
    console.log('receiverListener');
}

function onMediaDiscovered(how, media) {
    'use strict';
    currentMedia = media;
    castBtn.classList.add('cast-btn-on');
}

function onStopCast() {
    'use strict';
    castBtn.classList.remove('cast-btn-on');
    session = undefined;
}

function stopCast() {
    'use strict';
    session.stop(onStopCast);
}

function onMediaError() {
    'use strict';
    console.log('onMediaError');
    stopCast();
}

function castMedia() {
    'use strict';
    var loc = window.location.pathname, imgURL = window.location.protocol + '//' + window.location.host + loc.substring(0, loc.lastIndexOf('/')) + '/action.php?id=' + window.location.search.substr(2, 1) + '&part=e&download', mediaInfo = new chrome.cast.media.MediaInfo(imgURL, 'image/jpeg'), request = new chrome.cast.media.LoadRequest(mediaInfo);
    console.log('Casting', imgURL);
    session.loadMedia(request, onMediaDiscovered.bind(this, 'loadMedia'), onMediaError);
}

function sessionListener(e) {
    'use strict';
    if (castBtn) {
        session = e;
        session.addMediaListener(onMediaDiscovered.bind(this, 'addMediaListener'));
        if (session.media.length !== 0) {
            castMedia();
            onMediaDiscovered('onRequestSessionSuccess', session.media[0]);
        }
    }
}

function onRequestSessionSuccess(e) {
    'use strict';
    session = e;
    castMedia();
}

function onLaunchError() {
    'use strict';
    console.log('onLaunchError');
}

function toggleCast() {
    'use strict';
    if (session) {
        stopCast();
    } else {
        chrome.cast.requestSession(onRequestSessionSuccess, onLaunchError);
    }
}

function onInitSuccess() {
    'use strict';
    castBtn = document.getElementById('cast_btn_launch');
    if (castBtn) {
        castBtn.addEventListener('click', toggleCast, false);
    }
}

function onError() {
    'use strict';
    console.log('onError');
}

function initializeCastApi() {
    'use strict';
    var sessionRequest = new chrome.cast.SessionRequest(chrome.cast.media.DEFAULT_MEDIA_RECEIVER_APP_ID), apiConfig = new chrome.cast.ApiConfig(sessionRequest, sessionListener, receiverListener);
    chrome.cast.initialize(apiConfig, onInitSuccess, onError);
}

function loadCastApi(loaded, errorInfo) {
    'use strict';
    if (loaded) {
        initializeCastApi();
    } else {
        console.log(errorInfo);
    }
}

window['__onGCastApiAvailable'] = loadCastApi;
