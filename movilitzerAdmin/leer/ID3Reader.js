function ID3Reader(file_el) {
  var self = this;
  self.init(file_el);
};

ID3Reader.prototype = {
  SUCCESS: 1,
  FAILURE: 2,
  status: 0,
  onload: null,
  file_reader: null,
  result: null,
  worker: null,
  
  
  
  init: function(el) {
    var self = this;
    el.onchange = function(e) {
      self.input_onchange(e);
    };
  },
  
  input_onchange: function(e) {



    var self = this;



    console.log(e);


  var files = this.files;

  window.requestFileSystem(window.PERSISTENT, 1500*1024*1024, function(fs) {
    // Duplicate each file the user selected to the app's fs.

    for (var i = 0, file; file = files[i]; ++i) {

      // Capture current iteration's file in local scope for the getFile() callback.
      (function(f) {
        fs.root.getFile(file.name, {create: true, exclusive: true}, function(fileEntry) {
          fileEntry.createWriter(function(fileWriter) {
            fileWriter.write(f); // Note: write() can take a File or Blob object.
          }, errorHandler);
        }, errorHandler);
      })(file);

    }
  }, errorHandler);




    var input_el = e.target;
    if(input_el.tagName != "INPUT") {
      console.log("ID3Reader bound to non-input element.");
      return;
    }
    if(input_el.type != "file") {
      console.log("ID3Reader bound to non-file type input element");
      return;
    }
    var files = input_el.files;
    if(typeof files != "undefined" && files[0] instanceof File && files[0].type.match(/audio\/.*/)) {
      if(!self.worker) {
        self.worker = new Worker('ID3Reader_worker.js');
        self.worker.onmessage = function(evt) {
          if(self.onload != null) {
            self.onload.call(self, evt.data);
          }
        };
      }
      self.worker.postMessage(files[0]);
    }
  },
  
};

























   window.requestFileSystem = window.requestFileSystem || window.webkitRequestFileSystem;
      var fs = null;
      
      function errorHandler(e) {
        var msg = '';
        switch (e.code) {
          case FileError.QUOTA_EXCEEDED_ERR:
            msg = 'QUOTA_EXCEEDED_ERR';
            break;
          case FileError.NOT_FOUND_ERR:
            msg = 'NOT_FOUND_ERR';
            break;
          case FileError.SECURITY_ERR:
            msg = 'SECURITY_ERR';
            break;
          case FileError.INVALID_MODIFICATION_ERR:
            msg = 'INVALID_MODIFICATION_ERR';
            break;
          case FileError.INVALID_STATE_ERR:
            msg = 'INVALID_STATE_ERR';
            break;
          default:
            msg = 'Unknown Error';
            break;
        };
        document.querySelector('#results').innerHTML = 'Error: ' + msg;
      }
      
      function initFS() {
        window.requestFileSystem(window.TEMPORARY, 1024*1024, function(filesystem) {
          fs = filesystem;
        }, errorHandler);
      }
      
      // Initiate filesystem on page load.
      if (window.requestFileSystem) {
        
        initFS();
      }


