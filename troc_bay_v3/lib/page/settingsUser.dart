import 'package:flutter/material.dart';
import 'package:http/http.dart';
import 'package:troc_bay_v3/page/connexion.dart';
import 'package:troc_bay_v3/page/updateProfile.dart';
import '../crud/userCrud/delete.dart';

class SettingsUser extends StatefulWidget {
  const SettingsUser({Key? key}) : super(key: key);
  @override
  State<SettingsUser> createState() => _SettingUserState();
}

class _SettingUserState extends State<SettingsUser> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          title: const Text('Votre compte'),
          backgroundColor: Colors.black,
          toolbarHeight: 63,
        ),
        body: Container(
            padding: const EdgeInsets.all(10.0),
            child: Center(
                child: Column(children: [
              const CircleAvatar(
                radius: 100,
                backgroundImage: NetworkImage(
                    'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png'),
              ),
              const SizedBox(height: 30),
              const Text('Pseudo 1'),
              Row(
                mainAxisAlignment: MainAxisAlignment.spaceAround,
                children: [Text('Nom'), Text('Prenom')],
              ),
              const Text('Email'),
              const Text('Localisation'),
              ElevatedButton(
                  onPressed: () => onGoUpdate(),
                  child: const Text('Editer profil')),
              ElevatedButton(
                  onPressed: () => onDelete(),
                  child: const Text('Supprimer mon compte !'))
            ]))));
  }

  onGoUpdate() {
    Navigator.push(
        context, MaterialPageRoute(builder: (context) => const updateP()));
  }

  onDelete() {
    Future<String> del = Delete.deleteU(3);
    Navigator.push(
        context,
        MaterialPageRoute(
            builder: (context) => const LogInPage(title: "title")));
  }
}
