let video = document.getElementById('video');
let log = document.getElementById('output');
//test
StartCamera();
//end test

  const handleStream = (stream) => {
    video.srcObject = stream;
    video.play();
    streamStarted = true;
  };

async function StartCamera(){

let mediaConstraints = {
    video:true,
    video: { facingMode: "user" },
    audio:false
};

if ('mediaDevices' in navigator && 'getUserMedia' in navigator.mediaDevices) {
    var stream = await getMedia(mediaConstraints);
    handleStream(stream);

  }
}



async function getMedia(constraints) {
    let stream = null;
    try {
      stream = await navigator.mediaDevices.getUserMedia(constraints);
      console.log(stream);
      log.textContent += stream+'\n';
    } catch (err) {
        console.log("camera error");
    }
    return stream;
  }
  


var qr = new QrcodeDecoder();
setInterval(function(){
qr.decodeFromVideo(video).then((res) => {
    console.log(res);
    console.log(res.data);
    log.textContent += res.data+'\n';
    // window.location.href = res.data;
  });
}, 500);