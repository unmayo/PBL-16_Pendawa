import 'package:flutter/material.dart';
import 'package:pendawa/home.dart';
import 'package:pendawa/login.dart';
import 'package:pendawa/pendataanadmin.dart';
import 'package:pendawa/pengajuanadmin.dart';
import 'package:pendawa/profileB.dart';
import 'package:pendawa/settings.dart';
import 'package:pendawa/rtlist.dart';

class MyHomeAdmin extends StatelessWidget {
  const MyHomeAdmin({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: HomeAdminPage(),
    );
  }
}

class HomeAdminPage extends StatelessWidget {
  const HomeAdminPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xffF1EFEF),
      bottomNavigationBar: BottomNavigationBar(
        items: [
          BottomNavigationBarItem(icon: Icon(Icons.home), label: 'Beranda'),
          BottomNavigationBarItem(
              icon: Icon(Icons.add_to_home_screen), label: 'Pengajuan'),
          BottomNavigationBarItem(
              icon: Icon(Icons.assignment_ind), label: 'Pendataan'),
        ],
        unselectedItemColor: Colors.blue,
        onTap: (int index) {
          if (index == 0) {
            Navigator.push(context,
                MaterialPageRoute(builder: (context) => HomeAdminPage()));
          } else if (index == 1) {
            Navigator.push(context,
                MaterialPageRoute(builder: (context) => PengajuanAdminPage()));
          } else if (index == 2) {
            Navigator.push(context,
                MaterialPageRoute(builder: (context) => RTListPage()));
          }
        },
      ),
      body: ListView(
        children: [
          SizedBox(height: 10),
          Container(
            height: 100,
            margin: EdgeInsets.symmetric(horizontal: 10.0),
            child: Row(
              children: [
                Flexible(
                  fit: FlexFit.tight,
                  child: MaterialButton(
                    child: Text(
                      'Hello, Admin RT 01',
                      textAlign: TextAlign.start,
                      style: primaryTextstyle.copyWith(
                          fontSize: 20, fontWeight: bold),
                    ),
                    onPressed: () {
                      Navigator.push(context,
                          MaterialPageRoute(builder: (context) => LoginPage()));
                    },
                  ),
                ),
                SizedBox(width: 70),
                Container(
                  height: 50,
                  width: 50,
                  decoration: BoxDecoration(
                      image:
                          DecorationImage(image: AssetImage('images/nata.jpg')),
                      borderRadius: BorderRadius.circular(50),
                      border: Border.all(
                          color: Colors.white,
                          style: BorderStyle.solid,
                          width: 5)),
                )
              ],
            ),
          ),
          Container(
            decoration: BoxDecoration(
                gradient: LinearGradient(
                    colors: [colorpath1, colorpath2],
                    stops: [0.3, 0.7],
                    begin: Alignment.centerLeft,
                    end: Alignment.topRight),
                borderRadius: BorderRadius.circular(20.0)),
            height: 85,
            margin: EdgeInsets.symmetric(horizontal: 20.0),
            padding: EdgeInsets.fromLTRB(0, 0, 10, 0),
            child: Row(
              children: [
                SizedBox(width: 10),
                Container(
                    alignment: Alignment.topRight,
                    height: 50,
                    width: 50,
                    decoration: BoxDecoration(
                        image: DecorationImage(
                            image: AssetImage('images/nata.jpg')),
                        borderRadius: BorderRadius.circular(50),
                        border: Border.all(
                            color: Colors.white,
                            style: BorderStyle.solid,
                            width: 5))),
                Flexible(
                  fit: FlexFit.tight,
                  child: MaterialButton(
                    child: Padding(
                      padding: const EdgeInsets.fromLTRB(0, 0, 40, 0),
                      child: Text(
                        'Admin RT 01',
                        textAlign: TextAlign.left,
                        style: whiteTextstyle.copyWith(
                            fontSize: 15, fontWeight: bold),
                      ),
                    ),
                    onPressed: () {
                      Navigator.push(context,
                          MaterialPageRoute(builder: (context) => HomePage()));
                    },
                  ),
                ),
                Row(
                  children: [
                    Container(
                      height: 30,
                      width: 80,
                      child: ElevatedButton(
                        style: ElevatedButton.styleFrom(
                            backgroundColor: whiteColor),
                        onPressed: () {
                          TemporNik().nikC = UserNik().nik;
                          Navigator.push(
                              context,
                              MaterialPageRoute(
                                  builder: (context) => const ProfilePageB()));
                        },
                        child: Text(
                          'Profile',
                          style: primaryTextstyle.copyWith(fontWeight: bold),
                        ),
                      ),
                    ),
                  ],
                )
              ],
            ),
          ),
          SizedBox(height: 15),
          Container(
            height: 23,
            decoration: BoxDecoration(
                color: colorpath1, borderRadius: BorderRadius.circular(5)),
            margin: EdgeInsets.symmetric(horizontal: 70),
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Flexible(
                  fit: FlexFit.tight,
                  child: Text(
                    'Data Warga RT 01',
                    textAlign: TextAlign.center,
                    style:
                        whiteTextstyle.copyWith(fontSize: 16, fontWeight: bold),
                  ),
                ),
              ],
            ),
          ),
          SizedBox(height: 15),
          Container(
            height: 200,
            decoration: BoxDecoration(
                gradient: LinearGradient(
                    colors: [colorpath1, colorpath2],
                    stops: [0.3, 0.7],
                    begin: Alignment.centerLeft,
                    end: Alignment.topRight),
                borderRadius: BorderRadius.circular(10)),
            margin: EdgeInsets.symmetric(horizontal: 20.0),
            child: Row(
              children: [
                SizedBox(width: 8),
                Card(
                  color: whiteColor,
                  child: Padding(
                    padding: const EdgeInsets.all(20.0),
                    child: Container(
                      width: 100,
                      height: 130,
                      child: Column(
                        children: [
                          ClipRRect(
                            borderRadius: BorderRadius.circular(0),
                            child: Container(
                              width: 80,
                              height: 105,
                              child: Image.asset('images/nata.jpg', width: 80),
                            ),
                          ),
                          SizedBox(height: 10),
                          Flexible(
                            fit: FlexFit.tight,
                            child: Text(
                              'Hang Lekir, Blok 1A',
                              style: primaryTextstyle.copyWith(
                                  fontSize: 10, fontWeight: bold),
                            ),
                          )
                        ],
                      ),
                    ),
                  ),
                ),
                SizedBox(width: 5),
                Flexible(
                  fit: FlexFit.tight,
                  child: Padding(
                    padding: const EdgeInsets.fromLTRB(0, 0, 10, 0),
                    child: Container(
                      height: 30,
                      width: 85,
                      child: ElevatedButton(
                        style: ElevatedButton.styleFrom(
                            backgroundColor: whiteColor),
                        onPressed: () {
                          Navigator.push(
                              context,
                              MaterialPageRoute(
                                  builder: (context) =>
                                      const PendataanAdminPage()));
                        },
                        child: Text(
                          'Lainnya',
                          style: primaryTextstyle.copyWith(
                              fontSize: 15, fontWeight: bold),
                        ),
                      ),
                    ),
                  ),
                ),
              ],
            ),
          ),
          SizedBox(height: 15),
          Container(
            height: 23,
            decoration: BoxDecoration(
                color: colorpath1, borderRadius: BorderRadius.circular(5)),
            margin: EdgeInsets.symmetric(horizontal: 70),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                Flexible(
                  fit: FlexFit.tight,
                  child: Text(
                    'Informasi RT & RW',
                    style:
                        whiteTextstyle.copyWith(fontSize: 16, fontWeight: bold),
                  ),
                ),
              ],
            ),
          ),
          SizedBox(height: 15),
          SizedBox(
            width: double.infinity,
            height: 210,
            child: Stack(
              children: [
                Card(
                  clipBehavior: Clip.antiAliasWithSaveLayer,
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(15)),
                  elevation: 5,
                  child: Column(
                    children: [
                      SizedBox(
                        width: double.infinity,
                        height: 150,
                        child: Image.asset(
                          'images/17agustus.jpg',
                          fit: BoxFit.cover,
                        ),
                      ),
                      SizedBox(height: 5),
                      SizedBox(
                        child: Column(
                          children: [
                            Text(
                              'Kegiatan 17 Agustus Tahun 2022, Perumahan Villa Hang Lekir dan Mega Legenda',
                              style: primaryTextstyle.copyWith(
                                  fontSize: 13, fontWeight: bold),
                            )
                          ],
                        ),
                      )
                    ],
                  ),
                ),
              ],
            ),
          ),
          SizedBox(height: 15),
          SizedBox(
            width: double.infinity,
            height: 210,
            child: Stack(
              children: [
                Card(
                  clipBehavior: Clip.antiAliasWithSaveLayer,
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(15)),
                  elevation: 5,
                  child: Column(
                    children: [
                      SizedBox(
                        width: double.infinity,
                        height: 150,
                        child: Image.asset(
                          'images/tenismeja.jpg',
                          fit: BoxFit.cover,
                        ),
                      ),
                      SizedBox(height: 5),
                      SizedBox(
                        child: Column(
                          children: [
                            Text(
                              'Kegiatan Lomba Tenis Meja Tahun 2022, Perumahan Villa Hang Lekir dan Mega Legenda Batam Centre',
                              style: primaryTextstyle.copyWith(
                                  fontSize: 13, fontWeight: bold),
                            )
                          ],
                        ),
                      )
                    ],
                  ),
                ),
              ],
            ),
          ),
          SizedBox(height: 15),
          SizedBox(
            width: double.infinity,
            height: 210,
            child: Stack(
              children: [
                Card(
                  clipBehavior: Clip.antiAliasWithSaveLayer,
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(15)),
                  elevation: 5,
                  child: Column(
                    children: [
                      SizedBox(
                        width: double.infinity,
                        height: 150,
                        child: Image.asset(
                          'images/posyandu.jpg',
                          fit: BoxFit.cover,
                        ),
                      ),
                      SizedBox(height: 5),
                      SizedBox(
                        child: Column(
                          children: [
                            Text(
                              'Kegiatan Posyandu Tahun 2022, Perumahan Villa Hang Lekir dan Mega Legenda Batam Centre',
                              style: primaryTextstyle.copyWith(
                                  fontSize: 13, fontWeight: bold),
                            )
                          ],
                        ),
                      )
                    ],
                  ),
                ),
              ],
            ),
          ),
          SizedBox(height: 15)
        ],
      ),
    );
  }
}
