import 'package:troc_bay_v3/model/troc.dart';

import '../../model/user.dart';
import 'dart:convert';
import 'package:http/http.dart' as http;

class addTroc {
  static Future<http.Response> addTrocs(Troc troc) async {
    var data = {
      "label": troc.label,
      "description": troc.description,
      "pics": troc.imageBase64,
      "idUser": troc.idUser,
    };
    String body = jsonEncode(data);

    http.Response response = await http.post(
      Uri.parse('http://localhost:8000/createTrocs.php'),
      headers: {"Content-Type": "application/json"},
      body: body,
    );
    print('c fait');
    print(response);
    return response;
  }
}
