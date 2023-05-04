let video = document.getElementById('video');
let log = document.getElementById('log');


StartCamera();

const handleStream = (stream) => {
  video.srcObject = stream;
  video.play();
};

async function StartCamera() {
  let mediaConstraints = {
    video: true,
    video: { facingMode: "user" },
    audio: false
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


  intervalId = setInterval(function() {
    qr.decodeFromVideo(video).then((res) => {
      console.log(res);
      console.log(res.data);
      if (log) {
        log.textContent += res.data+'\n';
      }
      
      // Send data to qrscannercontroller.php via Fetch API
      const formData = new FormData();
      formData.append('ticket', res.data);
      fetch('http://localhost/qr/scan', {
        method: 'post',
        body: formData
      })
      .then(response => {
        console.log('Response:', response);
        return response.text();
      })
      .then(data => {
        console.log('Data:', data);
        clearInterval(intervalId);
        const ticketInfo = document.createElement('div');
        ticketInfo.innerHTML = data;
        const container = document.getElementById('response-container');
        if (container) {
          container.appendChild(ticketInfo);
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
      
    });
  }, 500);






