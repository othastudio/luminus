// @Author: Othmane N.
// @Date:   2024-03-14 11:25H
// 🚨 SECRETS REQUIRED: None

const archiver = require("archiver");
const fs = require("fs");
const glob = require("glob");
const semver = require("semver");
const path = require('path');

console.log("Start handling new release ⏳");

const excludePatterns = [
  "**/node_modules/**",
  "**/__tests__/**",
  "**/.github/**",
  "**/.husky/**",
  "**/.env.example",
  "**/debugger.js",
  "**/yarn.lock",
  "**/package-lock.json",
  "**/README.md",
  "**/package.json",
  "**/.release",
];

// Write the updated package.json back to the file
const packageJsonPath = path.join(__dirname, '../package.json');
try{
  fs.readFile(packageJsonPath, "utf8", (err, data) => {
    if (err) {
      console.error("Error reading package.json file:", err);
      return;
    }
  
    // Parse package.json data into a JavaScript object
    const packageJson = JSON.parse(data);
  
    // Modify the JavaScript object (for example, update a property)
    packageJson.version = semver.inc(packageJson.version, "patch");
  
    // Convert the modified object back to JSON
    const updatedPackageJson = JSON.stringify(packageJson, null, 2);
    // Read the package.json file
    const packageJsonPath = path.join(__dirname, '../package.json');
  
    // Increment the version number (e.g., patch)
    packageJson.version = semver.inc(packageJson.version, "patch");
  
    function signature() {
      const currentDate = new Date();
      const day = currentDate.getDate();
      const month = currentDate.getMonth() + 1;
      const year = currentDate.getFullYear();
      function generateRandomString(length) {
        const characters = "abcdefghijklmnopqrstuvwxyz0123456789";
        let result = "";
        for (let i = 0; i < length; i++) {
          result += characters.charAt(
            Math.floor(Math.random() * characters.length)
          );
        }
        return result;
      }
  
      const chain = `${generateRandomString(3)}-${generateRandomString(3)}`;
  
      return chain;
    }
  
    const themeName = packageJson.name;
    const themeVersion = packageJson.version;
  
    const fileName = `${themeName}-v${themeVersion}-${signature()}.zip`;
    const output = fs.createWriteStream(`./.releases/output/${fileName}`);
    const archive = archiver("zip", { zlib: { level: 9 } });
  
    archive.pipe(output);
  
    const files = glob.sync("**/*", { ignore: excludePatterns });
    files.forEach((file) => {
      archive.file(file, { name: file });
    });
  
    archive.finalize();
  
    output.on("close", () => {
      console.log("Release created successfully ✅");
    });
  
    archive.on("warning", (err) => {
      if (err.code === "ENOENT") {
        console.warn("Release not created 🚫");
        console.warn(err.message);
      } else {
        throw err;
      }
    });
  
    archive.on("error", (err) => {
      console.warn("Release not created 🚫");
      throw err;
    });
  
    // Write the updated JSON back to the package.json file
    fs.writeFile(packageJsonPath, updatedPackageJson, "utf8", (err) => {
      if (err) {
        console.error("Error saving package.json file:", err);
        return;
      }
      console.log("package.json file has been updated.");
    });
  });
}catch(error){
  console.error('Error handling new release:', error.message);
  process.exit(1);
}