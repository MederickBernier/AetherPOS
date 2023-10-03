import fs from 'fs-extra';
import chokidar from 'chokidar';

// Watch the temp_build directory for changes
const watcher = chokidar.watch('temp_build', {
    persistent: true
});

watcher.on('change', (path) => {
    // Move JS files
    if (path.endsWith('.js') && fs.existsSync(path)) {
        fs.moveSync(path, path.replace('temp_build', 'public'), { overwrite: true });
    }

    // Move CSS files
    if (path.endsWith('.css') && fs.existsSync(path)) {
        fs.moveSync(path, path.replace('temp_build', 'public'), { overwrite: true });
    }
});
