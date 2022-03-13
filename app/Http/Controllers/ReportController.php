public function sendRequestMessage(Request $request)
    {
        if ($request->ajax()) {
            $validatedData = $request->validate([
                'message' => ['required']
            ]);

            $req = new Requests;

            $req->user_id = Auth::user()->id;
            $req->message = $validatedData['message'];

            if ($req->save()) {
                $user_id = $req->user_id;
                $user = User::where('id', $req->user_id)->first()->username;
                $message = $req;

                return response()->json([
                    'id' => $user_id,
                    'response' => $message,
                    'user' => $user
                ]);
            }
        }
    }

    public function report_schedule(Request $request)
    {
        if ($request->ajax()) {
            $validatedData = $request->validate([
                'id' => ['required']
            ]);

            return response()->json(['date' => Transactions::find($validatedData['id'])->transaction_deadline]);
        }
    }