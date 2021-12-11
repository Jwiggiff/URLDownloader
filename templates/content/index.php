<h1>URL Downloader</h1>

<form action="/download" method="POST">
  <div class="input-group">
    <label for="url">URL:</label>
    <input type="text" id="url" name="url" placeholder="URL">
  </div>

  <div class="input-group">
    <label for="path">Path:</label>
    <input type="text" id="path" name="path" placeholder="/path/to/file">
  </div>

  <button type="button">Download</button>
</form>