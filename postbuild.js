import fs from 'fs-extra';

// Check if directory exists before moving files
const moveIfDirExists = (src, dest) => {
    if (fs.existsSync(src)) {
        fs.moveSync(src, dest, { overwrite: true });
    }
};

// Move JS files
moveIfDirExists('temp_build/js', 'public/js');

// Move CSS files
moveIfDirExists('temp_build/css', 'public/css');

// Clean up temporary build directory
fs.removeSync('temp_build');
