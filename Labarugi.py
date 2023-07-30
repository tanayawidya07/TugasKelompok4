from pulp import *

# Fungsi untuk menyelesaikan masalah Linear Programming
def solve_lp_problem(data_barang):
    prob = LpProblem("PaketPenjualan", LpMaximize)

    # Variabel
    paket = LpVariable.dicts("Paket", data_barang, lowBound=0, cat='Integer')

    # Fungsi tujuan (maksimalkan laba)
    prob += lpSum([paket[barang] * (barang['harga_jual'] - barang['harga_beli']) for barang in data_barang]), "Total_Laba"

    # Batasan (misalnya, total paket yang dapat dijual harus kurang dari jumlah stok)
    prob += lpSum([paket[barang] for barang in data_barang]) <= 100, "Batasan_Stok"

    # Solusi masalah LP
    prob.solve()

    # Menampilkan hasil
    for v in prob.variables():
        if v.varValue > 0:
            print(v.name, "=", v.varValue)

    print("Total Laba = ", value(prob.objective))

# Contoh penggunaan
import requests
response = requests.get('http://localhost/path/to/your/php/api.php')
data_barang = response.json()

solve_lp_problem(data_barang)
