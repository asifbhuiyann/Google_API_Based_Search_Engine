#PART OF ASIF STARETED HERE
import os
import requests

# Get the user query.
query = os.environ["QUERY"]

# Call the Bard API.
bard_response = requests.get("https://bard.ai/v1/query", params={"query": query})
bard_answer = bard_response.json()["answer"]

# Call the ChatGPT API.
chatgpt_response = requests.get("https://chatgpt.googleapis.com/v1/text/generate", params={"text": query})
chatgpt_answer = chatgpt_response.json()["text"]

# Display the results to the user.
print("Bard answer:", bard_answer)
print("ChatGPT answer:", chatgpt_answer)

# Open a web page.
def open_web_page(url):
    # Get the operating system.
    operating_system = os.name

    # Open the web page in the default web browser.
    if operating_system == "Windows":
        os.startfile(url)
    elif operating_system == "Mac":
        open(url, "open")
    elif operating_system == "Linux":
        webbrowser.open(url)

# Open a YouTube video.
def open_youtube_video(video_id):
    # Get the YouTube URL for the video.
    youtube_url = "https://www.youtube.com/watch?v=" + video_id

    # Open the YouTube video in the default web browser.
    open_web_page(youtube_url)

# Open a Facebook page.
def open_facebook_page(page_id):
    # Get the Facebook URL for the page.
    facebook_url = "https://www.facebook.com/" + page_id

    # Open the Facebook page in the default web browser.
    open_web_page(facebook_url)

# Perform an action on the user device.
def perform_action(action):
    # Get the operating system.
    operating_system = os.name

    # Perform the action on the user device.
    if action == "open_web_page":
        open_web_page(input("Enter the URL of the web page you want to open: "))
    elif action == "open_youtube_video":
        open_youtube_video(input("Enter the ID of the YouTube video you want to open: "))
    elif action == "open_facebook_page":
        open_facebook_page(input("Enter the ID of the Facebook page you want to open: "))
    else:
        print("Unknown action.")
#PART OF ASIF ENDED HERE