
import requests
from bs4 import BeautifulSoup

def scrape_website_data(url):
    # Mengirim permintaan HTTP GET ke URL
    response = requests.get(url)

    # Mengecek status kode permintaan
    if response.status_code == 200:
        # Membuat objek BeautifulSoup dari konten halaman
        soup = BeautifulSoup(response.content, 'html.parser')

        # Menggunakan metode BeautifulSoup untuk mengekstrak data yang diinginkan
        # Misalnya, jika ingin mengumpulkan semua teks dari elemen paragraf <p>
        paragraphs = soup.find_all('p')
        data = [p.get_text() for p in paragraphs]

        return data
    else:
        print("Permintaan tidak berhasil.")

# Contoh penggunaan
url = 'https://www.example.com'  # Ganti dengan URL situs web yang ingin Anda scrape
website_data = scrape_website_data(url)
for data in website_data:
    print(data)
