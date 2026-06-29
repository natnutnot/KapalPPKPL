from locust import HttpUser, task, between
import re

class ShipInspectionUser(HttpUser):

    wait_time = between(1, 2)

    @task
    def inspection_flow(self):

        # Home
        home = self.client.get("/")

        # Ambil CSRF Token
        token = re.search(
            r'name="_token" value="([^"]+)"',
            home.text
        ).group(1)

        # Pilih pengujian
        select = self.client.post(
            "/select-test",
            data={
                "_token": token,
                "ship_type": "tanker",
                "ship_area": "lambung_(hull)",
                "test_type": "ultrasonic"
            },
            allow_redirects=False
        )

        location = select.headers["Location"]

        # buka form ultrasonic
        form = self.client.get(location)

        # simpan data
        token2 = re.search(
            r'name="_token" value="([^"]+)"',
            form.text
        ).group(1)

        id_inspeksi = location.split("/")[-2]

        self.client.post(
            f"/ultrasonic/{id_inspeksi}",
            data={
                "_token": token2,
                "t_origin": 20,
                "metode_t_min": "rule_90",
                "nilai_ketebalan": 18,
                "batas_standar": 18,
                "frekuensi_ut": 5,
                "level_pengujian": "B",
                "kelas_area": "B",
                "jenis_cacat": "Korosi",
                "kedalaman_cacat": 1,
                "panjang_cacat": 10,
                "amplitudo_gema": 40,
                "dac_referensi": 30
            }
        )

        self.client.get(
            f"/ultrasonic-analysis/result/{id_inspeksi}"
        )