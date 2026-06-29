from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import time

BASE_URL = "http://127.0.0.1:8000"

driver = webdriver.Chrome()
driver.maximize_window()

wait = WebDriverWait(driver, 20)

driver.get(BASE_URL)

wait.until(
    EC.visibility_of_element_located((By.ID, "ship_type"))
)

print("[PASS] Home")

Select(
    driver.find_element(By.ID, "ship_type")
).select_by_value("tanker")

Select(
    driver.find_element(By.ID, "ship_area")
).select_by_index(1)

Select(
    driver.find_element(By.ID, "test_type")
).select_by_value("ultrasonic")

submit = wait.until(
    EC.presence_of_element_located(
        (By.CSS_SELECTOR, "button[type='submit']")
    )
)

driver.execute_script("""
arguments[0].scrollIntoView({
    block:'center'
});
""", submit)

time.sleep(1)

driver.execute_script(
    "arguments[0].click();",
    submit
)

print("[PASS] Test Selection")

wait.until(
    EC.visibility_of_element_located(
        (By.ID, "t_origin")
    )
)

driver.find_element(By.ID, "t_origin").send_keys("10")

Select(
    driver.find_element(By.ID, "metode_t_min")
).select_by_value("rule_90")

driver.find_element(
    By.ID,
    "nilai_ketebalan"
).send_keys("9")

driver.find_element(
    By.ID,
    "batas_standar"
).send_keys("9")

driver.find_element(
    By.ID,
    "frekuensi_ut"
).send_keys("5")

Select(
    driver.find_element(By.ID, "level_pengujian")
).select_by_value("B")

Select(
    driver.find_element(By.ID, "kelas_area")
).select_by_value("B")

driver.find_element(
    By.ID,
    "jenis_cacat"
).send_keys("Porosity")

driver.find_element(
    By.ID,
    "kedalaman_cacat"
).send_keys("1")

driver.find_element(
    By.ID,
    "panjang_cacat"
).send_keys("10")

driver.find_element(
    By.ID,
    "amplitudo_gema"
).send_keys("5")

driver.find_element(
    By.ID,
    "dac_referensi"
).send_keys("5")

print("[PASS] Input Ultrasonic")

save = wait.until(
    EC.presence_of_element_located(
        (By.CSS_SELECTOR, "button[type='submit']")
    )
)

driver.execute_script("""
arguments[0].scrollIntoView({
    block:'center'
});
""", save)

time.sleep(1)

driver.execute_script(
    "arguments[0].click();",
    save
)

print("[PASS] Save Data")

wait.until(
    EC.visibility_of_element_located(
        (
            By.XPATH,
            "//h1[contains(.,'Hasil Analisis Ultrasonic Test')]"
        )
    )
)

print("[PASS] Result Analysis")

driver.save_screenshot("01_result.png")

# Klik tombol Validasi Sekarang
validate_btn = wait.until(
    EC.element_to_be_clickable(
        (By.LINK_TEXT, "Validasi Sekarang")
    )
)

driver.execute_script(
    "arguments[0].scrollIntoView({block:'center'});",
    validate_btn
)

time.sleep(1)

driver.execute_script(
    "arguments[0].click();",
    validate_btn
)

print("[PASS] Open Validation Page")

# Tunggu textarea muncul
wait.until(
    EC.visibility_of_element_located(
        (By.ID, "catatan_validasi_accept")
    )
)

driver.find_element(
    By.ID,
    "catatan_validasi_accept"
).send_keys(
    "Regression Testing menggunakan Selenium WebDriver."
)

print("[PASS] Fill Validation Note")

# Klik tombol Validasi Hasil
validate_submit = wait.until(
    EC.presence_of_element_located(
        (
            By.XPATH,
            "//button[contains(.,'Validasi Hasil')]"
        )
    )
)

driver.execute_script(
    "arguments[0].scrollIntoView({block:'center'});",
    validate_submit
)

time.sleep(1)

driver.execute_script(
    "arguments[0].click();",
    validate_submit
)

print("[PASS] Submit Validation")

wait.until(
    EC.visibility_of_element_located(
        (
            By.XPATH,
            "//span[contains(.,'TERVALIDASI')]"
        )
    )
)

print("[PASS] Status Validated")

driver.save_screenshot("02_validated.png")

generate_btn = wait.until(
    EC.presence_of_element_located(
        (By.ID, "generateBtn")
    )
)

driver.execute_script(
    "arguments[0].scrollIntoView({block:'center'});",
    generate_btn
)

time.sleep(1)

driver.execute_script(
    "arguments[0].click();",
    generate_btn
)

print("[PASS] Generate Report Clicked")

wait.until(
    EC.visibility_of_element_located(
        (By.ID, "reportSuccess")
    )
)

print("[PASS] PDF Generated")

driver.save_screenshot("03_report_generated.png")

source = driver.page_source.lower()

keywords = [
    "re-inspection",
    "re inspection",
    "inspeksi ulang"
]

found = any(keyword in source for keyword in keywords)

if found:
    print("[PASS] Re-Inspection Feature Found")
else:
    print("[FAIL] Re-Inspection Feature Not Implemented")
    print("Regression Test Failed because Change Request has not been developed yet.")


driver.save_screenshot("04_final.png")

time.sleep(2)

driver.quit()