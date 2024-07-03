const fs = require('fs');


const dummyData = { message: 'Hello, world!' };


const jsonData = JSON.stringify(dummyData, null, 2); 


const filePath = 'test.json';


fs.writeFile(filePath, jsonData, (err) => {
    if (err) {
        console.error('Error writing to file:', err);
    } else {
        console.log(`Data successfully written to ${filePath}`);
    }
});
