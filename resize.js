var gm = require('gm');

gm('screenshots/mobile-480x320.png')
  .resize(240, 240)
  .write('screenshots/resize.png', function (err) {
    if (!err) console.log('done');
  });
