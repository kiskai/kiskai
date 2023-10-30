//Code execute when page loaded
document.addEventListener("DOMContentLoaded", function() {
    //Called Progress bar function
    startProgressBar();});

   
//Function that perform progress bar function
function startProgressBar() {
  // Get the progress bar element
  var progressBar = document.getElementById("progress-bar");

  // Reset the progress bar to 0%
  progressBar.style.width = "0%";
  progressBar.setAttribute("aria-valuenow", "0");

  // Set the target progress to 100%
  var targetProgress = 40;

  // Set the interval duration and calculate the increment for each interval
  var intervalDuration = 100; // in milliseconds
  var increment = (targetProgress / (1000 / intervalDuration));

  // Start the progress animation
  var currentProgress = 0;
  var progressInterval = setInterval(function() {
    currentProgress += increment;
    progressBar.style.width = currentProgress + "%";
    progressBar.setAttribute("aria-valuenow", currentProgress.toFixed(2));

    
    // Stop the progress animation when it reaches the target progress
    if (currentProgress >= targetProgress) {      
      clearInterval(progressInterval);
    }
  }, intervalDuration);
}