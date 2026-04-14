import 'dart:ffi';

import 'package:flutter/material.dart';

class Ex4 {
  void run() {
    runApp(
      MaterialApp(
        home: SafeArea(
          child: Scaffold(
            // appBar: AppBar(
            //   backgroundColor: Colors.red,
            //   title: const Text('Tu hoc Flutter'),
            // ), // AppBar
            // body: const Center(child: Text('Hello World')), // Center
            body: Center(child:  myWidget(false))
            ,
          ), // Scaffold
        ), // SafeArea
        debugShowCheckedModeBanner: false,
      ),
    ); // MaterialApp
  }
}

class myWidget extends StatelessWidget {

  final bool loading;
  myWidget(this.loading);

  @override
  Widget build(BuildContext context) {
    // if (loading) {
    //   return const CircularProgressIndicator();
    // } else {
    //   return const Text('State');
    // }
    // TODO: implement build

    return loading ? const CircularProgressIndicator() :const Text('State');

    throw UnimplementedError();
  }

}