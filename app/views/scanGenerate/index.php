<h1>Scan</h1>
<video id="video" controls autoplay muted width="500"  style="pointer-events: none;">
</video>

<textarea id="output"></textarea>


<h1>Generate</h1>
<form action="/qr/generate">
    <input type="text" id="data" name="data" placeholder="Text to generate">
    <input type="submit" value="submit"></input>
</form>



<script src="https://unpkg.com/qrcode-decoder@0.3.1/dist/index.min.js"></script>
<script src="/js/scan.js"></script>
<img id="qr" src="/qr/generate?data=a" width="150" height="150"></img>

<!-- <iframe id="qr" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=yeetus" width="150" height="150"></iframe> -->

