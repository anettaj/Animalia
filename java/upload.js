// Main Wrapper Selector
const avatarFileUpload = document.getElementById('AvatarFileUpload')
// Preview Wrapper Selector
const imageViewer = avatarFileUpload.querySelector('.selected-image-holder>img')
// Image Selector button Selector
const imageSelector = avatarFileUpload.querySelector('.avatar-selector-btn')
// Image Input File Selector
const imageInput = avatarFileUpload.querySelector('input[name="image"]')

/** Trigger Browsing Image to Upload */
imageSelector.addEventListener('click', e => {
    e.preventDefault()
    // Trigger Image input click
    simulateClick(imageInput);
});

/** Helper function to simulate a click event */
function simulateClick(element) {
    const event = new MouseEvent('click', {
        view: window,
        bubbles: true,
        cancelable: true
    });
    element.dispatchEvent(event);
}

/** IF Selected Image has change */
imageInput.addEventListener('change', e => {
    // Open File eader
    var reader = new FileReader();
    reader.onload = function(){
        // Preview Image
        imageViewer.src = reader.result;
    };
    // Read Selected Image as DataURL
    reader.readAsDataURL(e.target.files[0]);
})